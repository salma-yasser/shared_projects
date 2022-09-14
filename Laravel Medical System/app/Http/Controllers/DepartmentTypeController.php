<?php

namespace App\Http\Controllers;

use App\Models\DepartmentType;
use Illuminate\Http\Request;

class DepartmentTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $department_types = DepartmentType::latest()->paginate(5);
    return view('department_types.index',compact('$department_types'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('department_types.create');
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
      ]);
      DepartmentType::create($request->all());
      return redirect()->route('department_types.index')
            ->with('success','تم إضافة البيانات الجديده بنجاح');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DepartmentType  $department_type
   * @return \Illuminate\Http\Response
   */
  public function show(DepartmentType $department_type)
  {
      return view('department_types.show',compact('department_type'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DepartmentType  $department_type
   * @return \Illuminate\Http\Response
   */
  public function edit(DepartmentType $department_type)
  {
      return view('department_types.edit',compact('department_type'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DepartmentType  $department_type
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, DepartmentType $department_type)
  {
      $request->validate([
        'name' => 'required',
      ]);
      $department_type->update($request->all());
      return redirect()->route('department_types.index')
              ->with('success','تم تحديث البيانات بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DepartmentType  $department_type
   * @return \Illuminate\Http\Response
   */
  public function destroy(DepartmentType $department_type)
  {
      $department_type->delete();
      return redirect()->route('department_types.index')
              ->with('success','تم حذف البيانات بنجاح');
  }
}
