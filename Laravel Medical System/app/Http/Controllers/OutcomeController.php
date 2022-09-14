<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AdultPatientOutcome;
use App\Models\ChildPatientOutcome;
use App\Models\Outcome;
use Carbon\Carbon;

class OutcomeController extends Controller
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

    $total = 0;
    $adult_outcomes = AdultPatientOutcome::whereBetween('created_at', [$from, $to])->get();
    foreach($adult_outcomes as $outcome){
      $total += $outcome->paid;
    }
    $child_outcomes = ChildPatientOutcome::whereBetween('created_at', [$from, $to])->get();
    foreach($child_outcomes as $outcome){
      $total += $outcome->paid;
    }
    $general_outcomes = Outcome::whereBetween('created_at', [$from, $to])->get();
    foreach($general_outcomes as $outcome){
      $total += $outcome->paid;
    }
    return view('outcomes.index',compact('adult_outcomes', 'child_outcomes', 'general_outcomes', 'total'));
}

public function display(Request $request)
{
    $total = 0;
    $adult_outcomes = AdultPatientOutcome::whereBetween('created_at', [$request->from, $request->to])->with('adult_package.department_package', 'adult_package', 'adult_patient', 'adult_patient.department')->get();
    foreach($adult_outcomes as $outcome){
      $total += $outcome->paid;
    }
    $child_outcomes = ChildPatientOutcome::whereBetween('created_at', [$request->from, $request->to])->with('child_package.department_package', 'child_package', 'child_patient', 'child_package.department_package.department')->get();
    foreach($child_outcomes as $outcome){
      $total += $outcome->paid;
    }
    $general_outcomes = Outcome::whereBetween('created_at', [$request->from, $request->to])->get();
    foreach($general_outcomes as $outcome){
      $total += $outcome->paid;
    }
     return response()->json([
        'adult_outcomes' => $adult_outcomes,
        'child_outcomes' => $child_outcomes,
        'general_outcomes' => $general_outcomes,
        'total' => $total
    ]);
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
  return view('outcomes.create');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
  $validator = Validator::make($request->all(), [
      'description' => ['required'],
      'paid' => ['required', 'numeric'],
  ]);

  if ($validator->fails()) {
     return redirect()->route('outcomes.index')
                 ->withErrors($validator, 'add_outcome')
                 ->withInput();
  }

  Outcome::create($request->all());
  return redirect()->route('outcomes.index')
                  ->with('success','تم إضافة المبلغ المصروف بنجاح');
}

/**
* Display the specified resource.
*
* @param  \App\Outcome  $outcome
* @return \Illuminate\Http\Response
*/
public function show(Outcome $outcome)
{
  return view('outcomes.show',compact('outcome'));
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\Outcome  $outcome
* @return \Illuminate\Http\Response
*/
public function edit(Outcome $outcome)
{
  return view('outcomes.edit',compact('outcome'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Outcome  $outcome
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Outcome $outcome)
{
  $request->validate([
      'name' => 'required',
      'detail' => 'required',
  ]);
  $outcome->update($request->all());
  return redirect()->route('outcomes.index')
                  ->with('success','Outcome updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param  \App\Outcome  $outcome
* @return \Illuminate\Http\Response
*/
public function destroy(Outcome $outcome)
{
  $outcome->delete();
  return redirect()->route('outcomes.index')
                  ->with('success','Outcome deleted successfully');
}
}
