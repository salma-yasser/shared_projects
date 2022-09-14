<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $departments = Department::all();
    $department_types = DepartmentType::all();
    return view('departments.index',compact('departments','department_types'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('departments.create');
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
          'name' => ['required', 'string', 'max:255'],
          'department_type_id' => ['required'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('departments.index')
                     ->withErrors($validator, 'add_department')
                     ->withInput();
      }

      Department::create($request->all());
      return redirect()->route('departments.index')
            ->with('success','تم إضافة البيانات الجديده بنجاح');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Department  $department
   * @return \Illuminate\Http\Response
   */
  public function show(Department $department)
  {
      return view('departments.show',compact('department'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Department  $department
   * @return \Illuminate\Http\Response
   */
  public function edit(Department $department)
  {
      return view('departments.edit',compact('department'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Department  $department
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Department $department)
  {
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'max:255'],
          'department_type_id' => ['required'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('departments.index')
                     ->withErrors($validator, 'edit_department')
                     ->withInput();
      }

      $department->update($request->all());
      return redirect()->route('departments.index')
              ->with('success','تم تحديث البيانات بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Department  $department
   * @return \Illuminate\Http\Response
   */
  public function destroy(Department $department)
  {
      $department->delete();
      return redirect()->route('departments.index')
              ->with('success','تم حذف البيانات بنجاح');
  }
}
