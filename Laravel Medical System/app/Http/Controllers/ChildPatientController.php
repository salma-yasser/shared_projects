<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Department;
use App\Models\Nationality;
use App\Models\ChildPatient;
use Illuminate\Http\Request;
use App\Models\ChildDepartment;
use Illuminate\Validation\Rule;
use App\Models\DepartmentPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChildPatientController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $child_patients = ChildPatient::where('deleted', false)->get();
    // ->latest()->paginate(10);
    return view('child_patients.index',compact('child_patients'));
        // ->with('i', (request()->input('page', 1) - 1) * 10);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $nationalities = Nationality::all();
    $departments = Department::whereIn('department_type_id', [2])->get();
    return view('child_patients.create', compact('nationalities','departments'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = $request->validate([
        'photo' => ['nullable', 'image', 'max:2048'],
        'fullname' => ['required', 'string', 'max:255'],
        'fullname_parent' => ['required', 'string', 'max:255'],
        'email' => ['nullable'],
        'kind' => ['required'],
        'mobile_1' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
        'sa_id_parent' => ['required', 'string', 'max:255', 'unique:child_patients'],
        'birthdate' => ['required', 'date_format:"d/m/Y'],
        'nationality_id' => ['required'],
        'address' => ['nullable','string', 'max:255'],
        'work' => ['nullable','string', 'max:255'],
        'entry_date' => ['required', 'date_format:"d/m/Y'],
        'department_id' => ['required', "array","min:1"],
    ]);

    DB::beginTransaction(); // Start the transaction
    try {
        // Prepare Request
        $fullname_array = explode(' ', trim($request->fullname));
        if(isset($request['previous_session'])){
          $request->merge(["previous_session" => true]);
        }

        //Save
        $patient = ChildPatient::create($request->all() +
          ['name' => $fullname_array[0].(count($fullname_array)>1?" ".$fullname_array[1].(count($fullname_array)>2?" ".$fullname_array[count($fullname_array)-1]:""):""),
          'password' => Hash::make("12345678")//Str::random(8))
        ]);

        if (isset($request['photo'])) {
          $patient->updateProfilePhoto($request['photo']);
        }

        if (isset($request['department_id'])) {
          foreach ($request->department_id as $key => $value) {
            ChildDepartment::create([
              'child_patient_id' => $patient->id,
              'department_id' => $value
            ]);
          }
        }

        DB::commit();      //End transaction
        return redirect()->route('child_patients.show', $patient->id)
            ->with('success', 'تم إضافة بيانات المريض بنجاح');
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\ChildPatient  $child_patient
  * @return \Illuminate\Http\Response
  */
  public function show(ChildPatient $child_patient, $tabindex = 1)
  {
      $nationalities = Nationality::all();
      $departments = Department::whereIn('department_type_id', [2])->get();
      $department_packages = DepartmentPackage::where('department_id',$child_patient->department_id)
                    ->orderBy('session_number')->get();
      $appointment_types = DepartmentPackage::where('department_id',$child_patient->department_id)
                    ->where('session_number', 1)->orderBy('session_number')->get();
      return view('child_patients.show',compact('tabindex', 'child_patient','nationalities','departments', 'department_packages', 'appointment_types'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\ChildPatient  $child_patient
  * @return \Illuminate\Http\Response
  */
  public function edit(ChildPatient $child_patient)
  {
    return view('child_patients.edit',compact('child_patient'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\ChildPatient  $child_patient
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, ChildPatient $child_patient)
  {
    $validator = Validator::make($request->all(), [
        'photo' => ['nullable', 'image', 'max:2048'],
        'fullname' => ['required', 'string', 'max:255'],
        'fullname_parent' => ['required', 'string', 'max:255'],
        'email' => ['nullable'],
        'kind' => ['required'],
        'mobile_1' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
        'sa_id_parent' => ['required', 'string', 'max:255', Rule::unique('child_patients')->ignore($child_patient->id)],
        'birthdate' => ['required', 'date_format:"d/m/Y'],
        'nationality_id' => ['required'],
        'address' => ['nullable','string', 'max:255'],
        'work' => ['nullable','string', 'max:255'],
        'entry_date' => ['required', 'date_format:"d/m/Y'],
        'department_id' => ['required', "array","min:1"],
    ]);

    if ($validator->fails()) {
       return redirect()->route('child_patients.show', ['child_patient' => $child_patient->id, 'tabindex' => 1])
                   ->withErrors($validator, 'apt_info')
                   ->withInput();
    }

    DB::beginTransaction(); // Start the transaction
    try {
        // Prepare Request
        $fullname_array = explode(' ', trim($request->fullname));
        if(isset($request['previous_session'])){
          $request->merge(["previous_session" => true]);
        }

        //Save
        if (isset($request['photo'])) {
          $child_patient->updateProfilePhoto($request['photo']);
        }

        $child_patient->update($request->all() +
          ['name' => $fullname_array[0].(count($fullname_array)>1?" ".$fullname_array[1].(count($fullname_array)>2?" ".$fullname_array[count($fullname_array)-1]:""):"")
        ]);

        //update child_departments
        foreach ($child_patient->child_departments as $key => $value) {
          if(!in_array($value->department_id, $request->department_id)){
            $value->delete();
          }
        }
        foreach ($request->department_id as $key => $value) {
          if(!in_array($value, $child_patient->child_departments->pluck('department_id')->toArray())){
            ChildDepartment::create([
              'child_patient_id' => $child_patient->id,
              'department_id' => $value
            ]);
          }
        }


        DB::commit();      //End transaction
        return redirect()->route('child_patients.show', ['child_patient' => $child_patient->id, 'tabindex' => 1])
            ->with('success', 'تم تحديث بيانات المريض بنجاح');
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\ChildPatient  $child_patient
  * @return \Illuminate\Http\Response
  */
  public function destroy(ChildPatient $child_patient)
  {
    $child_patient->fill([
      'deleted' => true
    ])->save();
    return redirect()->route('child_patients.index')
          ->with('success','تم حذف المريض بنجاح');
  }

}
