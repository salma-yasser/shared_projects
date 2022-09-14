<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\EmpSessionTime;
use App\Models\EmpSessionTimeDay;
use App\Models\AdultAppointment;
use App\Models\ChildAppointment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
      $doctors = Employee::where('exist',1)
          ->whereHas('department', function (Builder $query) {
          $query->whereIn('department_type_id', [2,5]);
      })
          ->orWhere('department_id', 2)  // for adding medical maneger also
          ->get();

      return view('doctors.index',compact('doctors'));
        // ->with('i', (request()->input('page', 1) - 1) * 10);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('doctors.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // Employee::create($request->all());
    // return redirect()->route('doctors.index')
    //       ->with('success','تم إضافة الباقة بنجاح');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Employee  $doctor
  * @return \Illuminate\Http\Response
  */
  public function show(Employee $doctor, $tabindex = 1)
  {
    return view('doctors.show',compact('tabindex', 'doctor'));
  }

  public function appointment(){
    $from = Carbon::now()->startOfDay();
    $to = Carbon::now()->addDays(1)->startOfDay();

    if(Auth::user()->department->department_type_id == 2){
      $appointments = ChildAppointment::where('employee_id', Auth::user()->id)
                    ->whereBetween('time', [$from, $to])->get();
      return view('doctors.child_appointment',compact('appointments'));
    }elseif(Auth::user()->department->department_type_id == 5){
      $appointments = AdultAppointment::where('employee_id', Auth::user()->id)
                    ->whereBetween('time', [$from, $to])->get();
      return view('doctors.adult_appointment',compact('appointments'));
    }
  }

  public function appointmentDisplay(Request $request)
  {
    if(Auth::user()->department->department_type_id == 2){
      return ChildAppointment::where('employee_id', Auth::user()->id)
                    ->whereBetween('time', [$request->from, $request->to])->with('department_package', 'employee', 'child_package', 'child_patient', 'child_appointment')->get();
    }elseif(Auth::user()->department->department_type_id == 5){
      return AdultAppointment::where('employee_id', Auth::user()->id)
                    ->whereBetween('time', [$request->from, $request->to])->with('department_package', 'employee', 'adult_package', 'adult_patient', 'adult_appointment')->get();
    }
  }

  public function schedule()
  {
    $doctor = Employee::find(Auth::user()->id);
    if(Auth::user()->department->department_type_id == 2){
      return view('doctors.child_schedule', compact('doctor'));
    }elseif(Auth::user()->department->department_type_id == 5){
      return view('doctors.adult_schedule', compact('doctor'));
    }
  }

  public function patient()
  {
    $doctor = Employee::find(Auth::user()->id);
    return view('doctors.adult_child_patient',compact('doctor'));
  }
  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Employee  $doctor
  * @return \Illuminate\Http\Response
  */
  public function edit(Employee $doctor)
  {
    return view('doctors.edit',compact('doctor'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Employee  $doctor
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Employee $doctor)
  {
    // $validator = Validator::make($request->all(), [
    //     'starting_time' => ['required', 'date_format:"d/m/Y'],
    //     'beginning.*' => ['required'],
    //     'ending.*' => ['required']
    // ]);
    //
    // if ($validator->fails()) {
    //    return redirect()->route('doctors.index')
    //                ->withErrors($validator, 'edit_session_time')
    //                ->withInput();
    // }
    DB::beginTransaction(); // Start the transaction
    try {
      $session_time_option = $request->input('session_time_option');
      $starting_time = $request->input('starting_time');
      $beginning = $request->input('beginning', []);
      $ending = $request->input('ending', []);

      $session_time = EmpSessionTime::create([
          'employee_id' => $doctor->id,
          'type' => $session_time_option,
          'start_date' => $starting_time,
          'attend_time' => $session_time_option==3?null:$beginning[0],
          'leave_time' => $session_time_option==3?null:$ending[0],
      ]);

      if($session_time_option==2){
        EmpSessionTime::create([
            'employee_id' => $doctor->id,
            'type' => $session_time_option,
            'start_date' => $starting_time,
            'attend_time' => $beginning[1],
            'leave_time' => $ending[1],
        ]);
      }elseif($session_time_option==3){
        $day_0 = $request->input('time_0', []);
        $day_1 = $request->input('time_1', []);
        $day_2 = $request->input('time_2', []);
        $day_3 = $request->input('time_3', []);
        $day_4 = $request->input('time_4', []);
        $day_5 = $request->input('time_5', []);
        for($row=0; $row<$request->session_number; $row++){
          EmpSessionTimeDay::create([
            'emp_session_time_id' => $session_time->id,
            'day_0' => $day_0[$row],
            'day_1' => $day_1[$row],
            'day_2' => $day_2[$row],
            'day_3' => $day_3[$row],
            'day_4' => $day_4[$row],
            'day_5' => $day_5[$row],
          ]);
        }
      }
      DB::commit();      //End transaction
      return redirect()->route('doctors.show', ['doctor' => $doctor->id, 'tabindex' => 3])
          ->with('success', 'تم تحديث مواعيد الجلسات بنجاح');
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->route('error-500');
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Employee  $doctor
  * @return \Illuminate\Http\Response
  */
  public function destroy(Employee $doctor)
  {
    $doctor->delete();
    return redirect()->route('doctors.index')
          ->with('success','تم حذف الباقة بنجاح');
  }

  public function getDoctorSessionsAndAppointments(Request $request, Employee $employee){
    $sessions = $employee->emp_session_times();
    if($employee->department->department_type_id == 5){
      $appointments = AdultAppointment::where('employee_id', $employee->id)
                      ->whereBetween('time', [$request->from, $request->to])
                      ->whereIn('status',[config('enums.patient_appointment_status_values.notyet'),config('enums.patient_appointment_status_values.attend')])->get();
    }elseif($employee->department->department_type_id == 2){
      $appointments = ChildAppointment::where('employee_id', $employee->id)
                      ->whereBetween('time', [$request->from, $request->to])
                      ->whereIn('status',[config('enums.patient_appointment_status_values.notyet'),config('enums.patient_appointment_status_values.attend')])->get();
    }elseif($employee->department_id == 2){
      $child_appointments = ChildAppointment::where('employee_id', $employee->id)
                      ->whereBetween('time', [$request->from, $request->to])
                      ->whereIn('status',[config('enums.patient_appointment_status_values.notyet'),config('enums.patient_appointment_status_values.attend')])->get();
      $adult_appointments = AdultAppointment::where('employee_id', $employee->id)
            ->whereBetween('time', [$request->from, $request->to])
            ->whereIn('status',[config('enums.patient_appointment_status_values.notyet'),config('enums.patient_appointment_status_values.attend')])->get();
      $appointments = $child_appointments->merge($adult_appointments);
    }
    $data = [
      "sessions" => $sessions,
      "appointments" => $appointments
    ];
    return response()->json($data);;
  }
}
