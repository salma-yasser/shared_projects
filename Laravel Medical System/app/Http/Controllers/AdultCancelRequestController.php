<?php

namespace App\Http\Controllers;

use App\Models\AdultCancelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdultCancelRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $adult_cancel_requests = AdultCancelRequest::all();
      // return view('adult_cancel_requests.index',compact('adult_cancel_requests'));
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
          'adult_package_id' => ['required', 'unique:adult_cancel_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 3])
                     ->withErrors($validator, 'request_cancel_package')
                     ->withInput();
      }

      $request_obj = AdultCancelRequest::create([
        'adult_package_id' => $request->adult_package_id,
        'adult_patient_id' => $request->adult_patient_id,
      ]);
      return redirect()->route('request_success', $request_obj->id)
          ->with('success', 'تم انشاء طلبكم بنجاح، في انتظار نتيجة الطلب في أقرب وقت!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdultCancelRequest  $adultCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AdultCancelRequest $adultCancelRequest)
    {
        return view('adult_cancel_requests.show',compact('adultCancelRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdultCancelRequest  $adultCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AdultCancelRequest $adultCancelRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdultCancelRequest  $adultCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdultCancelRequest $adultCancelRequest)
    {
        DB::beginTransaction(); // Start the transaction
        try {
            $adultCancelRequest->update([
              'status' => $request->status,
            ]);

            if($request->status == 1){
              $adultCancelRequest->adult_package->update([
                'status' => config('enums.patient_package_status_values.cancelled'),
                'refund' => $request->refund,
              ]);
            }

            DB::commit();      //End transaction
            $tabindex = 1;
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
     * @param  \App\Models\AdultCancelRequest  $adultCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdultCancelRequest $adultCancelRequest)
    {
        //
    }
}
