<?php

namespace App\Http\Controllers;

use App\Models\DepartmentSessionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Department;

class DepartmentSessionSettingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $department_session_settings = DepartmentSessionSetting::all();
    $departments = Department::whereIn('department_type_id', [2,5])->get();
    return view('department_session_settings.index',compact('department_session_settings', 'departments'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('department_session_settings.create');
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
          'department_id' => ['required'],
          'session_duration' => ['required', 'integer'],
          'session_patient_number' => ['required', 'integer'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('department_session_settings.index')
                     ->withErrors($validator, 'add_department_session_setting')
                     ->withInput();
      }

      DepartmentSessionSetting::create($request->all());
      return redirect()->route('department_session_settings.index')
            ->with('success','تم إضافة البيانات الجديده بنجاح');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DepartmentSessionSetting  $department_session_setting
   * @return \Illuminate\Http\Response
   */
  public function show(DepartmentSessionSetting $department_session_setting)
  {
      return view('department_session_settings.show',compact('department_session_setting'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DepartmentSessionSetting  $department_session_setting
   * @return \Illuminate\Http\Response
   */
  public function edit(DepartmentSessionSetting $department_session_setting)
  {
      return view('department_session_settings.edit',compact('department_session_setting'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DepartmentSessionSetting  $department_session_setting
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, DepartmentSessionSetting $department_session_setting)
  {
      $validator = Validator::make($request->all(), [
          'department_id' => ['required'],
          'session_duration' => ['required', 'integer'],
          'session_patient_number' => ['required', 'integer'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('department_session_settings.index')
                     ->withErrors($validator, 'edit_department_session_setting')
                     ->withInput();
      }

      $department_session_setting->update($request->all());
      return redirect()->route('department_session_settings.index')
              ->with('success','تم تحديث البيانات بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DepartmentSessionSetting  $department_session_setting
   * @return \Illuminate\Http\Response
   */
  public function destroy(DepartmentSessionSetting $department_session_setting)
  {
      $department_session_setting->delete();
      return redirect()->route('department_session_settings.index')
              ->with('success','تم حذف البيانات بنجاح');
  }
}
