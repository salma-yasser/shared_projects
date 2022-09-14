<?php

namespace App\Http\Controllers;

use App\Models\AdultPatient;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Nationality;
use App\Models\DepartmentPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdultPatientController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $adult_patients = AdultPatient::where('deleted', false)->get();
    // ->latest()->paginate(10);
    return view('adult_patients.index',compact('adult_patients'));
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
    $departments = Department::whereIn('department_type_id', [5])->get();
    return view('adult_patients.create', compact('nationalities','departments'));
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
        'email' => ['nullable'],
        'mobile_1' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
        'sa_id' => ['required', 'string', 'max:255', 'unique:adult_patients'],
        'birthdate' => ['required', 'date_format:"d/m/Y'],
        'nationality_id' => ['required'],
        'address' => ['nullable','string', 'max:255'],
        'work' => ['nullable','string', 'max:255'],
        'entry_date' => ['required', 'date_format:"d/m/Y'],
        'department_id' => ['required'],
    ]);

    DB::beginTransaction(); // Start the transaction
    try {
        // Prepare Request
        $fullname_array = explode(' ', trim($request->fullname));
        if($request->department_id == 6){
          $request->merge(["kind" => "ذكر"]);
        }elseif($request->department_id == 7){
          $request->merge(["kind" => "أنثى"]);
        }
        //Save
        $patient = AdultPatient::create($request->all() +
          ['name' => $fullname_array[0].(count($fullname_array)>1?" ".$fullname_array[1].(count($fullname_array)>2?" ".$fullname_array[count($fullname_array)-1]:""):""),
          'password' => Hash::make("12345678")//Str::random(8))
        ]);
        if (isset($request['photo'])) {
          $patient->updateProfilePhoto($request['photo']);
        }
        DB::commit();      //End transaction
        return redirect()->route('adult_patients.show', $patient->id)
            ->with('success', 'تم إضافة بيانات المريض بنجاح');
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\AdultPatient  $adult_patient
  * @return \Illuminate\Http\Response
  */
  public function show(AdultPatient $adult_patient, $tabindex = 1)
  {
      $nationalities = Nationality::all();
      $departments = Department::whereIn('department_type_id', [5])->get();
      $department_packages = DepartmentPackage::where('department_id',$adult_patient->department_id)
                    ->orderBy('session_number')->get();
      $appointment_types = DepartmentPackage::where('department_id',$adult_patient->department_id)
                    ->where('session_number', 1)->orderBy('session_number')->get();
      return view('adult_patients.show',compact('tabindex', 'adult_patient','nationalities','departments', 'department_packages', 'appointment_types'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\AdultPatient  $adult_patient
  * @return \Illuminate\Http\Response
  */
  public function edit(AdultPatient $adult_patient)
  {
    return view('adult_patients.edit',compact('adult_patient'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\AdultPatient  $adult_patient
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, AdultPatient $adult_patient)
  {
    $validator = Validator::make($request->all(), [
        'photo' => ['nullable', 'image', 'max:2048'],
        'fullname' => ['required', 'string', 'max:255'],
        'email' => ['nullable'],
        'mobile_1' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
        'sa_id' => ['required', 'string', 'max:255', Rule::unique('adult_patients')->ignore($adult_patient->id)],
        'birthdate' => ['required', 'date_format:"d/m/Y'],
        'nationality_id' => ['required'],
        'address' => ['nullable','string', 'max:255'],
        'work' => ['nullable','string', 'max:255'],
        'entry_date' => ['required', 'date_format:"d/m/Y'],
        'department_id' => ['required'],
    ]);

    if ($validator->fails()) {
       return redirect()->route('adult_patients.show', ['adult_patient' => $adult_patient->id, 'tabindex' => 1])
                   ->withErrors($validator, 'apt_info')
                   ->withInput();
    }

    DB::beginTransaction(); // Start the transaction
    try {
        // Prepare Request
        $fullname_array = explode(' ', trim($request->fullname));
        if($request->department_id == 6){
          $request->merge(["kind" => "ذكر"]);
        }elseif($request->department_id == 7){
          $request->merge(["kind" => "أنثى"]);
        }

        //Save
        if (isset($request['photo'])) {
          $adult_patient->updateProfilePhoto($request['photo']);
        }

        $adult_patient->update($request->all() +
          ['name' => $fullname_array[0].(count($fullname_array)>1?" ".$fullname_array[1].(count($fullname_array)>2?" ".$fullname_array[count($fullname_array)-1]:""):"")
        ]);

        DB::commit();      //End transaction
        return redirect()->route('adult_patients.show', ['adult_patient' => $adult_patient->id, 'tabindex' => 1])
            ->with('success', 'تم تحديث بيانات المريض بنجاح');
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\AdultPatient  $adult_patient
  * @return \Illuminate\Http\Response
  */
  public function destroy(AdultPatient $adult_patient)
  {
    $adult_patient->fill([
      'deleted' => true
    ])->save();
    return redirect()->route('adult_patients.index')
          ->with('success','تم حذف المريض بنجاح');
  }

}
