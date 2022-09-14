<?php

namespace App\Http\Controllers;

use App\Models\AdultExtraRebookRequest;
use App\Models\AdultAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdultExtraRebookRequestController extends Controller
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
          'adult_appointment_id' => ['required', 'unique:adult_extra_rebook_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 2])
                     ->withErrors($validator, 'request_extra_rebook_appointment')
                     ->withInput();
      }

      $request_obj = AdultExtraRebookRequest::create([
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
     * @param  \App\Models\AdultExtraRebookRequest  $adultExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AdultExtraRebookRequest $adultExtraRebookRequest)
    {
        return view('adult_extra_rebook_requests.show',compact('adultExtraRebookRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdultExtraRebookRequest  $adultExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AdultExtraRebookRequest $adultExtraRebookRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdultExtraRebookRequest  $adultExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdultExtraRebookRequest $adultExtraRebookRequest)
    {
        DB::beginTransaction(); // Start the transaction
        try {
          $adultExtraRebookRequest->update([
            'status' => $request->status,
          ]);

          if($request->status == 1){
            //Save
            $adult_appointment = $adultExtraRebookRequest->adult_appointment;
            $new_appointment = AdultAppointment::create([
                'adult_patient_id' => $adult_appointment->adult_patient_id,
                'employee_id' => $adult_appointment->employee_id,
                'department_package_id' => $adult_appointment->department_package_id,
                'adult_package_id' => $adult_appointment->adult_package_id,
                'name' => 'تعويض ال'.$adult_appointment->name,
                'time' => $request->new_time,
                'cost' => 0,
                'paid' => 0,
                'rest' => $adult_appointment->rest,
                'paid_type' => $adult_appointment->paid_type,
                'status' => config('enums.patient_appointment_status_values.notyet')
            ]);

            $adultExtraRebookRequest->adult_appointment->update([
              'adult_appointment_id' => $new_appointment->id,
            ]);
          }

        DB::commit();      //End transaction
        $tabindex = 4;
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
     * @param  \App\Models\AdultExtraRebookRequest  $adultExtraRebookRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdultExtraRebookRequest $adultExtraRebookRequest)
    {
        //
    }
}
