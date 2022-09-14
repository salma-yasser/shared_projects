<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ChildAppointment;
use App\Models\ChildPatientIncome;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChildAppointmentController extends Controller
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
    $child_appointments = ChildAppointment::whereBetween('time', [$from, $to])->get();
    return view('child_appointments.index',compact('child_appointments'));
        // ->with('i', (request()->input('page', 1) - 1) * 10);
  }

  public function display(Request $request)
  {
    return ChildAppointment::whereBetween('time', [$request->from, $request->to])->with('department_package', 'employee', 'child_package', 'child_patient', 'child_appointment')->get();
  }

  public function schedule()
  {
    $departments = Department::where('department_type_id', 2)->get();
    $doctors = Employee::where('exist', 1)->whereIn('department_id', $departments->pluck('id'))->orderBy('department_id')->get();
    return view('child_appointments.schedule', compact('doctors'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('child_appointments.create');
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
        'appointment_type' => ['required'],
        'cost' => ['required', 'numeric'],
        'paid' => ['required', 'numeric'],
        'rest' => ['required', 'numeric'],
        'time' => ['required'],
        'employee_id' => ['required'],
    ]);

    if ($validator->fails()) {
       return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 2])
                   ->withErrors($validator, 'add_package')
                   ->withInput();
    }

    DB::beginTransaction(); // Start the transaction
    try {
        // Prepare Saving
        $appointment_type = json_decode($request->appointment_type,true);
        $employee = json_decode($request->employee_id,true);

        //Save
        ChildAppointment::create([
            'child_patient_id' => $request->child_patient_id,
            'employee_id' => $employee["id"],
            'department_package_id' => $appointment_type["id"],
            'time' => $request->time,
            'cost' => $request->cost,
            'paid' => $request->paid,
            'rest' => $request->rest,
            'paid_type' => $request->paid_type,
            'status' => config('enums.patient_appointment_status_values.notyet')
        ]);

        if(isset($request->paid) && $request->paid>0){
          ChildPatientIncome::create([
             'child_patient_id' => $request->child_patient_id,
             'department_package_id' => $appointment_type["id"],
             'paid' => $request->paid,
             'paid_type' => $request->paid_type
         ]);
       }

        DB::commit();      //End transaction
        return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 2])
            ->with('success', 'تم حجز الموعد بنجاح');
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\ChildAppointment  $child_appointment
  * @return \Illuminate\Http\Response
  */
  public function show(ChildAppointment $child_appointment)
  {
      // $nationalities = Nationality::all();
      // $departments = Department::whereIn('department_type_id', [5])->get();
      return view('child_appointments.show',compact('child_appointment'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\ChildAppointment  $child_appointment
  * @return \Illuminate\Http\Response
  */
  public function edit(ChildAppointment $child_appointment)
  {
    return view('child_appointments.edit',compact('child_appointment'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\ChildAppointment  $child_appointment
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, ChildAppointment $child_appointment)
  {
    switch ($request->type) {
      case 'status_ajax':
        DB::beginTransaction(); // Start the transaction
        try {
          if(($request->status == config('enums.patient_appointment_status_values.execuse_medical')) && isset($request->medical_execuse_file)){
            $file = $request->file('medical_execuse_file');
            $filename = $child_appointment->id.'_'.$file->getClientOriginalName();
            $file->move(storage_path('app/public/child_patients/'.$child_appointment->child_patient_id.'/medical_execuse_file/'), $filename);
            $child_appointment->update([
              'status' => $request->status,
              'child_appointment_id' => 0,
              'medical_execuse_file' => 'child_patients/'.$child_appointment->child_patient_id.'/medical_execuse_file/'. $filename
            ]);
          }else{
            if($child_appointment->department_package->session_number != 1  && ($request->status==config('enums.patient_appointment_status_values.absent') || $request->status==config('enums.patient_appointment_status_values.execuse_telephone'))){
              $absent_appointments = ChildAppointment::where('child_package_id', $child_appointment->child_package_id)
                          ->whereIn('status',[config('enums.patient_appointment_status_values.absent'), config('enums.patient_appointment_status_values.execuse_telephone')])
                          ->get();
              if(count($absent_appointments) < $child_appointment->department_package->execuse_number){
                $child_appointment->update([
                  'status' => $request->status,
                  'child_appointment_id' => 0
                ]);
              }else{
                $child_appointment->update([
                'status' => $request->status
                ]);
              }
            }else{
              $child_appointment->update([
                'status' => $request->status
              ]);
            }
          }
          if($child_appointment->child_package->rest_session_number == 1){
            $child_appointment->child_package->update([
              'rest_session_number' => $child_appointment->child_package->rest_session_number - 1,
              'status' => config('enums.patient_package_status_values.completed')
            ]);
          }else{
            $child_appointment->child_package->update([
              'rest_session_number' => $child_appointment->child_package->rest_session_number - 1
            ]);
          }
          DB::commit();      //End transaction
          return $child_appointment;
          } catch (Exception $e) {
              DB::rollBack();
              return response()->json(['error' => 'error'.$e], 404); // Status code here
          }
        break;
      case 'status':
        DB::beginTransaction(); // Start the transaction
        try {
          if(($request->status == config('enums.patient_appointment_status_values.execuse_medical')) && isset($request->medical_execuse_file)){
            $file = $request->file('medical_execuse_file');
            $filename = $child_appointment->id.'_'.$file->getClientOriginalName();
            $file->move(storage_path('app/public/child_patients/'.$child_appointment->child_patient_id.'/medical_execuse_file/'), $filename);
            $child_appointment->update([
              'status' => $request->status,
              'child_appointment_id' => 0,
              'medical_execuse_file' => 'child_patients/'.$child_appointment->child_patient_id.'/medical_execuse_file/'. $filename
            ]);
          }else{
            if($child_appointment->department_package->session_number != 1  && ($request->status==config('enums.patient_appointment_status_values.absent') || $request->status==config('enums.patient_appointment_status_values.execuse_telephone'))){
              $absent_appointments = ChildAppointment::where('child_package_id', $child_appointment->child_package_id)
                          ->whereIn('status',[config('enums.patient_appointment_status_values.absent'), config('enums.patient_appointment_status_values.execuse_telephone')])
                          ->get();
              if(count($absent_appointments) < $child_appointment->department_package->execuse_number){
                $child_appointment->update([
                  'status' => $request->status,
                  'child_appointment_id' => 0
                ]);
              }else{
                $child_appointment->update([
                'status' => $request->status
                ]);
              }
            }else{
              $child_appointment->update([
                'status' => $request->status
              ]);
            }
          }
          if($child_appointment->child_package->rest_session_number == 1){
            $child_appointment->child_package->update([
              'rest_session_number' => $child_appointment->child_package->rest_session_number - 1,
              'status' => config('enums.patient_package_status_values.completed')
            ]);
          }else{
            $child_appointment->child_package->update([
              'rest_session_number' => $child_appointment->child_package->rest_session_number - 1
            ]);
          }
          DB::commit();      //End transaction
          return redirect()->route('child_patients.show', ['child_patient' => $child_appointment->child_patient_id, 'tabindex' => 2])
              ->with('success', 'تم تحديث حالة الموعد بنجاح');
          } catch (Exception $e) {
              DB::rollBack();
              return redirect()->route('error-500');
          }
        break;
        case 'default_edit':
          DB::beginTransaction(); // Start the transaction
          try {
              // Prepare Saving
              $employee = json_decode($request->employee_id,true);
              $old_paid = $child_appointment->paid;

              //Save
              $child_appointment->update([
                  'employee_id' => $employee["id"],
                  'time' => $request->time,
                  'paid' => $request->paid,
                  'rest' => $request->rest,
                  'paid_type' => $request->paid_type
              ]);

              if(isset($request->paid) && $request->paid>$old_paid){
                ChildPatientIncome::create([
                   'child_patient_id' => $child_appointment->child_patient_id,
                   'department_package_id' => $child_appointment->department_package_id,
                   'paid' => $request->paid,
                   'paid_type' => $request->paid_type
               ]);
             }

              DB::commit();      //End transaction
              return redirect()->route('child_patients.show', ['child_patient' => $child_appointment->child_patient_id, 'tabindex' => 2])
                  ->with('success', 'تم تحديث الموعد بنجاح');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('error-500');
            }
        break;

      case 'rebook_appointment':
        DB::beginTransaction(); // Start the transaction
        try {
          //Save
          $new_appointment = ChildAppointment::create([
              'child_patient_id' => $child_appointment->child_patient_id,
              'employee_id' => $child_appointment->employee_id,
              'department_package_id' => $child_appointment->department_package_id,
              'child_package_id' => $child_appointment->child_package_id,
              'name' => 'تعويض ال'.$child_appointment->name,
              'time' => ($request->appointments)[0],
              'cost' => 0,
              'paid' => 0,
              'rest' => $child_appointment->rest,
              'paid_type' => $child_appointment->paid_type,
              'status' => config('enums.patient_appointment_status_values.notyet')
          ]);

          $child_appointment->update([
            'child_appointment_id' => $new_appointment->id
          ]);
        DB::commit();      //End transaction
        // return response()->json([
        //     'old_appointment' => ChildAppointment::with('department_package', 'employee', 'child_package', 'child_patient', 'child_appointment')->find($child_appointment->id),
        //     'new_appointment' => ChildAppointment::with('department_package', 'employee', 'child_package', 'child_patient', 'child_appointment')->find($new_appointment->id)
        // ]);
          return redirect()->route('child_patients.show', ['child_patient' => $child_appointment->child_patient_id, 'tabindex' => 2])
              ->with('success', 'تم تعويض الموعد بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('error-500');
        }
        break;
        case 'change_appointment':

            $child_appointment->update([
                'time' => ($request->appointments)[0],
            ]);

            return redirect()->route('child_patients.show', ['child_patient' => $child_appointment->child_patient_id, 'tabindex' => 2])
                ->with('success', 'تم تحديث الموعد بنجاح');

            break;
      default:
        // code...
        break;
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\ChildAppointment  $child_appointment
  * @return \Illuminate\Http\Response
  */
  public function destroy(ChildAppointment $child_appointment)
  {
    // $child_appointment->fill([
    //   'deleted' => true
    // ])->save();
    return redirect()->route('child_appointments.index');
          // ->with('success','تم حذف المريض بنجاح');
  }
}
