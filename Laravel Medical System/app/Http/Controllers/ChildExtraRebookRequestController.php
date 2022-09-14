<?php

namespace App\Http\Controllers;

use App\Models\ChildExtraRebookRequest;
use App\Models\ChildAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ChildExtraRebookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
          'child_appointment_id' => ['required', 'unique:child_extra_rebook_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 2])
                     ->withErrors($validator, 'request_extra_rebook_appointment')
                     ->withInput();
      }

      $request_obj = ChildExtraRebookRequest::create([
        'child_appointment_id' => $request->child_appointment_id,
        'child_patient_id' => $request->child_patient_id,
        'time' => ($request->appointments)[0],
      ]);
      return redirect()->route('request_success', $request_obj->id)
          ->with('success', 'تم انشاء طلبكم بنجاح، في انتظار نتيجة الطلب في أقرب وقت!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildExtraRebookRequest  $childExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ChildExtraRebookRequest $childExtraRebookRequest)
    {
        return view('child_extra_rebook_requests.show',compact('childExtraRebookRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildExtraRebookRequest  $childExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildExtraRebookRequest $childExtraRebookRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildExtraRebookRequest  $childExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildExtraRebookRequest $childExtraRebookRequest)
    {
        DB::beginTransaction(); // Start the transaction
        try {
          $childExtraRebookRequest->update([
            'status' => $request->status,
          ]);

          if($request->status == 1){
            //Save
            $child_appointment = $childExtraRebookRequest->child_appointment;
            $new_appointment = ChildAppointment::create([
                'child_patient_id' => $child_appointment->child_patient_id,
                'employee_id' => $child_appointment->employee_id,
                'department_package_id' => $child_appointment->department_package_id,
                'child_package_id' => $child_appointment->child_package_id,
                'name' => 'تعويض ال'.$child_appointment->name,
                'time' => $request->new_time,
                'cost' => 0,
                'paid' => 0,
                'rest' => $child_appointment->rest,
                'paid_type' => $child_appointment->paid_type,
                'status' => config('enums.patient_appointment_status_values.notyet')
            ]);

            $childExtraRebookRequest->child_appointment->update([
              'child_appointment_id' => $new_appointment->id,
            ]);
          }

        DB::commit();      //End transaction
        $tabindex = 4;
        return redirect()->route('child_requests.index', compact('tabindex'))
            ->with('success', 'تم تحديث الطلب بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            // return response()->json(['error' => 'error'.$e], 404); // Status code here
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildExtraRebookRequest  $childExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildExtraRebookRequest $childExtraRebookRequest)
    {
        //
    }
}
