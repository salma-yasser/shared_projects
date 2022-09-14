<?php

namespace App\Http\Controllers;

use App\Models\AdultAppointment;
use App\Models\AdultPatientIncome;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class AdultAppointmentController extends Controller
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
    $adult_appointments = AdultAppointment::whereBetween('time', [$from, $to])->get();
    return view('adult_appointments.index',compact('adult_appointments'));
        // ->with('i', (request()->input('page', 1) - 1) * 10);
  }

  public function display(Request $request)
  {
    return AdultAppointment::whereBetween('time', [$request->from, $request->to])->with('department_package', 'employee', 'adult_package', 'adult_patient', 'adult_appointment')->get();
  }

  public function schedule()
  {
    $departments = Department::where('department_type_id', 5)->get();
    $doctors = Employee::where('exist', 1)->whereIn('department_id', $departments->pluck('id'))->orderBy('department_id')->get();
    return view('adult_appointments.schedule', compact('doctors'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('adult_appointments.create');
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
       return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 2])
                   ->withErrors($validator, 'add_package')
                   ->withInput();
    }

    DB::beginTransaction(); // Start the transaction
    try {
        // Prepare Saving
        $appointment_type = json_decode($request->appointment_type,true);
        $employee = json_decode($request->employee_id,true);

        //Save
        AdultAppointment::create([
            'adult_patient_id' => $request->adult_patient_id,
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
          AdultPatientIncome::create([
             'adult_patient_id' => $request->adult_patient_id,
             'department_package_id' => $appointment_type["id"],
             'paid' => $request->paid,
             'paid_type' => $request->paid_type
         ]);
       }

        DB::commit();      //End transaction
        return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 2])
            ->with('success', 'تم حجز الموعد بنجاح');
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\AdultAppointment  $adult_appointment
  * @return \Illuminate\Http\Response
  */
  public function show(AdultAppointment $adult_appointment)
  {
      // $nationalities = Nationality::all();
      // $departments = Department::whereIn('department_type_id', [5])->get();
      return view('adult_appointments.show',compact('adult_appointment'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\AdultAppointment  $adult_appointment
  * @return \Illuminate\Http\Response
  */
  public function edit(AdultAppointment $adult_appointment)
  {
    return view('adult_appointments.edit',compact('adult_appointment'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\AdultAppointment  $adult_appointment
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, AdultAppointment $adult_appointment)
  {
    switch ($request->type) {
      case 'status_ajax':
        DB::beginTransaction(); // Start the transaction
        try {
          if(($request->status == config('enums.patient_appointment_status_values.execuse_medical')) && isset($request->medical_execuse_file)){
            $file = $request->file('medical_execuse_file');
            $filename = $adult_appointment->id.'_'.$file->getClientOriginalName();
            $file->move(storage_path('app/public/adult_patients/'.$adult_appointment->adult_patient_id.'/medical_execuse_file/'), $filename);
            $adult_appointment->update([
              'status' => $request->status,
              'adult_appointment_id' => 0,
              'medical_execuse_file' => 'adult_patients/'.$adult_appointment->adult_patient_id.'/medical_execuse_file/'. $filename
            ]);
          }else{
            if($adult_appointment->department_package->session_number != 1  && ($request->status==config('enums.patient_appointment_status_values.absent') || $request->status==config('enums.patient_appointment_status_values.execuse_telephone'))){
              $absent_appointments = AdultAppointment::where('adult_package_id', $adult_appointment->adult_package_id)
                          ->whereIn('status',[config('enums.patient_appointment_status_values.absent'), config('enums.patient_appointment_status_values.execuse_telephone')])
                          ->get();
              if(count($absent_appointments) < $adult_appointment->department_package->execuse_number){
                $adult_appointment->update([
                  'status' => $request->status,
                  'adult_appointment_id' => 0
                ]);
              }else{
                $adult_appointment->update([
                'status' => $request->status
                ]);
              }
            }else{
              $adult_appointment->update([
                'status' => $request->status
              ]);
            }
          }
          if($adult_appointment->adult_package->rest_session_number == 1){
            $adult_appointment->adult_package->update([
              'rest_session_number' => $adult_appointment->adult_package->rest_session_number - 1,
              'status' => config('enums.patient_package_status_values.completed')
            ]);
          }else{
            $adult_appointment->adult_package->update([
              'rest_session_number' => $adult_appointment->adult_package->rest_session_number - 1
            ]);
          }
          DB::commit();      //End transaction
          return $adult_appointment;
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
            $filename = $adult_appointment->id.'_'.$file->getClientOriginalName();
            $file->move(storage_path('app/public/adult_patients/'.$adult_appointment->adult_patient_id.'/medical_execuse_file/'), $filename);
            $adult_appointment->update([
              'status' => $request->status,
              'adult_appointment_id' => 0,
              'medical_execuse_file' => 'adult_patients/'.$adult_appointment->adult_patient_id.'/medical_execuse_file/'. $filename
            ]);
          }else{
            if($adult_appointment->department_package->session_number != 1  && ($request->status==config('enums.patient_appointment_status_values.absent') || $request->status==config('enums.patient_appointment_status_values.execuse_telephone'))){
              $absent_appointments = AdultAppointment::where('adult_package_id', $adult_appointment->adult_package_id)
                          ->whereIn('status',[config('enums.patient_appointment_status_values.absent'), config('enums.patient_appointment_status_values.execuse_telephone')])
                          ->get();
              if(count($absent_appointments) < $adult_appointment->department_package->execuse_number){
                $adult_appointment->update([
                  'status' => $request->status,
                  'adult_appointment_id' => 0
                ]);
              }else{
                $adult_appointment->update([
                'status' => $request->status
                ]);
              }
            }else{
              $adult_appointment->update([
                'status' => $request->status
              ]);
            }
          }
          if($adult_appointment->adult_package->rest_session_number == 1){
            $adult_appointment->adult_package->update([
              'rest_session_number' => $adult_appointment->adult_package->rest_session_number - 1,
              'status' => config('enums.patient_package_status_values.completed')
            ]);
          }else{
            $adult_appointment->adult_package->update([
              'rest_session_number' => $adult_appointment->adult_package->rest_session_number - 1
            ]);
          }
          DB::commit();      //End transaction
          return redirect()->route('adult_patients.show', ['adult_patient' => $adult_appointment->adult_patient_id, 'tabindex' => 2])
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
              $old_paid = $adult_appointment->paid;

              //Save
              $adult_appointment->update([
                  'employee_id' => $employee["id"],
                  'time' => $request->time,
                  'paid' => $request->paid,
                  'rest' => $request->rest,
                  'paid_type' => $request->paid_type
              ]);

              if(isset($request->paid) && $request->paid>$old_paid){
                AdultPatientIncome::create([
                   'adult_patient_id' => $adult_appointment->adult_patient_id,
                   'department_package_id' => $adult_appointment->department_package_id,
                   'paid' => $request->paid,
                   'paid_type' => $request->paid_type
               ]);
             }

              DB::commit();      //End transaction
              return redirect()->route('adult_patients.show', ['adult_patient' => $adult_appointment->adult_patient_id, 'tabindex' => 2])
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
          $new_appointment = AdultAppointment::create([
              'adult_patient_id' => $adult_appointment->adult_patient_id,
              'employee_id' => $adult_appointment->employee_id,
              'department_package_id' => $adult_appointment->department_package_id,
              'adult_package_id' => $adult_appointment->adult_package_id,
              'name' => 'تعويض ال'.$adult_appointment->name,
              'time' => ($request->appointments)[0],
              'cost' => 0,
              'paid' => 0,
              'rest' => $adult_appointment->rest,
              'paid_type' => $adult_appointment->paid_type,
              'status' => config('enums.patient_appointment_status_values.notyet')
          ]);

          $adult_appointment->update([
            'adult_appointment_id' => $new_appointment->id
          ]);
        DB::commit();      //End transaction
        // return response()->json([
        //     'old_appointment' => AdultAppointment::with('department_package', 'employee', 'adult_package', 'adult_patient', 'adult_appointment')->find($adult_appointment->id),
        //     'new_appointment' => AdultAppointment::with('department_package', 'employee', 'adult_package', 'adult_patient', 'adult_appointment')->find($new_appointment->id)
        // ]);
          return redirect()->route('adult_patients.show', ['adult_patient' => $adult_appointment->adult_patient_id, 'tabindex' => 2])
              ->with('success', 'تم تعويض الموعد بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('error-500');
        }
        break;
        case 'change_appointment':

            $adult_appointment->update([
                'time' => ($request->appointments)[0],
            ]);

            return redirect()->route('adult_patients.show', ['adult_patient' => $adult_appointment->adult_patient_id, 'tabindex' => 2])
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
  * @param  \App\AdultAppointment  $adult_appointment
  * @return \Illuminate\Http\Response
  */
  public function destroy(AdultAppointment $adult_appointment)
  {
    // $adult_appointment->fill([
    //   'deleted' => true
    // ])->save();
    return redirect()->route('adult_appointments.index');
          // ->with('success','تم حذف المريض بنجاح');
  }
}
