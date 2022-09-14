<?php

namespace App\Http\Controllers;

use App\Models\AdultDiscountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdultDiscountRequestController extends Controller
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
          'adult_package_id' => ['required', 'unique:adult_discount_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 3])
                     ->withErrors($validator, 'request_discount_package')
                     ->withInput();
      }

      $request_obj = AdultDiscountRequest::create([
        'adult_package_id' => $request->adult_package_id,
        'adult_patient_id' => $request->adult_patient_id,
      ]);
      return redirect()->route('request_success', $request_obj->id)
          ->with('success', 'تم انشاء طلبكم بنجاح، في انتظار نتيجة الطلب في أقرب وقت!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdultDiscountRequest  $adultDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AdultDiscountRequest $adultDiscountRequest)
    {
        return view('adult_discount_requests.show',compact('adultDiscountRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdultDiscountRequest  $adultDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AdultDiscountRequest $adultDiscountRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdultDiscountRequest  $adultDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdultDiscountRequest $adultDiscountRequest)
    {
        DB::beginTransaction(); // Start the transaction
        try {
            $adultDiscountRequest->update([
              'status' => $request->status,
            ]);

            if($request->status == 1){
              $adultDiscountRequest->adult_package->update([
                'discount' => $request->discount,
                'rest' => $request->cost - $request->discount - $request->paid,
              ]);
            }

            DB::commit();      //End transaction
            $tabindex = 2;
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
     * @param  \App\Models\AdultDiscountRequest  $adultDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdultDiscountRequest $adultDiscountRequest)
    {
        //
    }
}
