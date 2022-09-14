<?php

namespace App\Http\Controllers;

use App\Models\ChildChangeAppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ChildChangeAppointmentRequestController extends Controller
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
          'child_appointment_id' => ['required', 'unique:child_change_appointment_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 2])
                     ->withErrors($validator, 'request_change_appointment')
                     ->withInput();
      }

      $request_obj = ChildChangeAppointmentRequest::create([
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
     * @param  \App\Models\ChildChangeAppointmentRequest  $childChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ChildChangeAppointmentRequest $childChangeAppointmentRequest)
    {
        return view('child_change_appointment_requests.show',compact('childChangeAppointmentRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildChangeAppointmentRequest  $childChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildChangeAppointmentRequest $childChangeAppointmentRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildChangeAppointmentRequest  $childChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildChangeAppointmentRequest $childChangeAppointmentRequest)
    {
        DB::beginTransaction(); // Start the transaction
        try {
          $childChangeAppointmentRequest->update([
            'status' => $request->status,
          ]);

          if($request->status == 1){
            //Save
            $childChangeAppointmentRequest->child_appointment->update([
              'time' => $request->new_time,
            ]);
          }

        DB::commit();      //End transaction
        $tabindex = 3;
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
     * @param  \App\Models\ChildChangeAppointmentRequest  $childChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildChangeAppointmentRequest $childChangeAppointmentRequest)
    {
        //
    }
}
