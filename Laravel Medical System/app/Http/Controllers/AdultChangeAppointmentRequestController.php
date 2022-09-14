<?php

namespace App\Http\Controllers;

use App\Models\AdultChangeAppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdultChangeAppointmentRequestController extends Controller
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
          'adult_appointment_id' => ['required', 'unique:adult_change_appointment_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 2])
                     ->withErrors($validator, 'request_change_appointment')
                     ->withInput();
      }

      $request_obj = AdultChangeAppointmentRequest::create([
        'adult_appointment_id' => $request->adult_appointment_id,
        'adult_patient_id' => $request->adult_patient_id,
        'time' => ($request->appointments)[0],
      ]);


      return redirect()->route('request_success', $request_obj->id)
          ->with('success', 'تم انشاء طلبكم بنجاح، في انتظار نتيجة الطلب في أقرب وقت!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdultChangeAppointmentRequest  $adultChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AdultChangeAppointmentRequest $adultChangeAppointmentRequest)
    {
        return view('adult_change_appointment_requests.show',compact('adultChangeAppointmentRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdultChangeAppointmentRequest  $adultChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AdultChangeAppointmentRequest $adultChangeAppointmentRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdultChangeAppointmentRequest  $adultChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdultChangeAppointmentRequest $adultChangeAppointmentRequest)
    {

        //Old update as a response of request from manager
        DB::beginTransaction(); // Start the transaction
        try {
          $adultChangeAppointmentRequest->update([
            'status' => $request->status,
          ]);

          if($request->status == 1){
            //Save
            $adultChangeAppointmentRequest->adult_appointment->update([
              'time' => $request->new_time,
            ]);
          }

        DB::commit();      //End transaction
        $tabindex = 3;
        return redirect()->route('adult_requests.index', compact('tabindex'))
            ->with('success', 'تم تحديث الطلب بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            // return response()->json(['error' => 'error'.$e], 404); // Status code here
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdultChangeAppointmentRequest  $adultChangeAppointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdultChangeAppointmentRequest $adultChangeAppointmentRequest)
    {
        //
    }
}
