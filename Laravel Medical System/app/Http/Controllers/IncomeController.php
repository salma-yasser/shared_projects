<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdultPatientIncome;
use App\Models\ChildPatientIncome;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{

  /**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $from = Carbon::now()->startOfDay();
    $to = Carbon::now()->addDays(1)->startOfDay();

    $adult_cash = $adult_network = $child_cash = $child_network = 0;
    $adult_incomes = AdultPatientIncome::whereBetween('created_at', [$from, $to])->get();
    foreach($adult_incomes as $income){
      if($income->paid_type == 0){
        $adult_cash += $income->paid;
      }elseif($income->paid_type == 1){
        $adult_network += $income->paid;
      }
    }
    $child_incomes = ChildPatientIncome::whereBetween('created_at', [$from, $to])->get();
    foreach($child_incomes as $income){
      if($income->paid_type == 0){
        $child_cash += $income->paid;
      }elseif($income->paid_type == 1){
        $child_network += $income->paid;
      }
    }

    $receiving_cash = ChildPatientIncome::where('paid_type', '0')->where('is_received', '0')->sum('paid')
        + AdultPatientIncome::where('paid_type', '0')->where('is_received', '0')->sum('paid');

    $receiving_date = Carbon::parse(max(ChildPatientIncome::where('paid_type', '0')->where('is_received', '1')->max('receiving_date')
        , AdultPatientIncome::where('paid_type', '0')->where('is_received', '1')->max('receiving_date')))->format('d/m/Y h:i a');

    return view('incomes.index',compact('adult_incomes', 'child_incomes', 'adult_cash', 'adult_network', 'child_cash', 'child_network', 'receiving_cash', 'receiving_date'));
}

public function display(Request $request)
{
    $adult_cash = $adult_network = $child_cash = $child_network = 0;
    $adult_incomes = AdultPatientIncome::whereBetween('created_at', [$request->from, $request->to])->with('department_package', 'adult_package', 'adult_patient', 'adult_patient.department')->get();
    foreach($adult_incomes as $income){
      if($income->paid_type == 0){
        $adult_cash += $income->paid;
      }elseif($income->paid_type == 1){
        $adult_network += $income->paid;
      }
    }
    $child_incomes = ChildPatientIncome::whereBetween('created_at', [$request->from, $request->to])->with('department_package','child_package.department_package', 'child_package', 'child_patient', 'child_package.department_package.department')->get();
    foreach($child_incomes as $income){
      if($income->paid_type == 0){
        $child_cash += $income->paid;
      }elseif($income->paid_type == 1){
        $child_network += $income->paid;
      }
    }
     return response()->json([
        'adult_incomes' => $adult_incomes,
        'child_incomes' => $child_incomes,
        'adult_cash' => $adult_cash,
        'adult_network' => $adult_network,
        'child_cash' => $child_cash,
        'child_network' => $child_network
    ]);
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
  return view('incomes.create');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
  $request->validate([
      'name' => 'required',
      'detail' => 'required',
  ]);
  Income::create($request->all());
  return redirect()->route('incomes.index')
                  ->with('success','Income created successfully.');
}

/**
* Display the specified resource.
*
* @param  \App\Income  $income
* @return \Illuminate\Http\Response
*/
public function show(Income $income)
{
  return view('incomes.show',compact('income'));
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\Income  $income
* @return \Illuminate\Http\Response
*/
public function edit(Income $income)
{
  return view('incomes.edit',compact('income'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $income
* @return \Illuminate\Http\Response
*/
public function update(Request $request, int $income)
{
   $receiving_date = Carbon::now()->format('Y-m-d H:i:s');

    ChildPatientIncome::where('paid_type', '0')
        ->where('is_received', '0')
        ->where('created_at', '<=', $receiving_date)
        ->update(['is_received' => '1', 'receiving_date' => $receiving_date]);

    AdultPatientIncome::where('paid_type', '0')
        ->where('is_received', '0')
        ->where('created_at', '<=', $receiving_date)
        ->update(['is_received' => '1', 'receiving_date' => $receiving_date]);

    return redirect()->route('incomes.index')
                  ->with('success','تم استلام النقدي بنجاح');
}

/**
* Remove the specified resource from storage.
*
* @param  \App\Income  $income
* @return \Illuminate\Http\Response
*/
public function destroy(Income $income)
{
  $income->delete();
  return redirect()->route('incomes.index')
                  ->with('success','Income deleted successfully');
}
}
