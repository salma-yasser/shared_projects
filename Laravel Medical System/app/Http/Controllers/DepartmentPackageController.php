<?php

namespace App\Http\Controllers;

use App\Models\DepartmentPackage;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentPackageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $departments = Department::whereIn('department_type_id', [2,5])->orderBy('department_type_id')->get();
    return view('department_packages.index',compact('departments'));
        // ->with('i', (request()->input('page', 1) - 1) * 10);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('department_packages.create');
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
        'department_id' => ['required'],
        'session_number' => ['required', 'integer'],
        'cost' => ['required', 'numeric'],
        'expire_duration' => ['required', 'integer'],
        'execuse_number' => ['required', 'integer']
    ]);

    if ($validator->fails()) {
       return redirect()->route('department_packages.index')
                   ->withErrors($validator, 'add_department_package')
                   ->withInput();
    }

    DepartmentPackage::create($request->all());
    return redirect()->route('department_packages.index')
          ->with('success','تم إضافة الباقة بنجاح');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\DepartmentPackage  $department_package
  * @return \Illuminate\Http\Response
  */
  public function show(DepartmentPackage $department_package)
  {
    return view('department_packages.show',compact('department_package'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\DepartmentPackage  $department_package
  * @return \Illuminate\Http\Response
  */
  public function edit(DepartmentPackage $department_package)
  {
    return view('department_packages.edit',compact('department_package'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\DepartmentPackage  $department_package
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, DepartmentPackage $department_package)
  {
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'department_id' => ['required'],
        'session_number' => ['required', 'integer'],
        'cost' => ['required', 'numeric'],
        'expire_duration' => ['required', 'integer'],
        'execuse_number' => ['required', 'integer']
    ]);

    if ($validator->fails()) {
       return redirect()->route('department_packages.index')
                   ->withErrors($validator, 'edit_department_package')
                   ->withInput();
    }

    $department_package->update($request->all());
    return redirect()->route('department_packages.index')
          ->with('success','تم تحديث الباقة بنجاح');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\DepartmentPackage  $department_package
  * @return \Illuminate\Http\Response
  */
  public function destroy(DepartmentPackage $department_package)
  {
    $department_package->delete();
    return redirect()->route('department_packages.index')
          ->with('success','تم حذف الباقة بنجاح');
  }
}
