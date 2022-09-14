<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $salaries = Salary::latest()->paginate(5);
      $salaries = Salary::where('employee_id', "!=", 1)
                // ->where('exist',1)
                ->get();
      return view('salaries.index', compact('salaries'));
          // ->with('i', (request()->input('page', 1) - 1) * 1);
    }

    /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('salaries.create');
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
          // 'name' => 'required',
          // 'detail' => 'required',
      ]);

      Salary::create($request->all());
      return redirect()->route('salaries.index')
            ->with('status','Salary created statusfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Salary  $salary
   * @return \Illuminate\Http\Response
   */
  public function show(Salary $salary)
  {
      return view('salaries.show',compact('salary'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Salary  $salary
   * @return \Illuminate\Http\Response
   */
  public function edit(Salary $salary)
  {
      return view('salaries.edit',compact('salary'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Salary  $salary
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Salary $salary)
  {
      $request->validate([
          // 'name' => 'required',
          // 'detail' => 'required',
      ]);

      $salary->update($request->all());
      return redirect()->route('salaries.index')
                      ->with('status','Salary updated statusfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Salary  $salary
   * @return \Illuminate\Http\Response
   */
  public function destroy(Salary $salary)
  {
      $salary->delete();
      return redirect()->route('salaries.index')
                      ->with('status','Salary deleted statusfully');
  }

}
