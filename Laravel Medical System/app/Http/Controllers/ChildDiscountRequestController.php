<?php

namespace App\Http\Controllers;

use App\Models\ChildDiscountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ChildDiscountRequestController extends Controller
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
          'child_package_id' => ['required', 'unique:child_discount_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 3])
                     ->withErrors($validator, 'request_discount_package')
                     ->withInput();
      }

      $request_obj = ChildDiscountRequest::create([
        'child_package_id' => $request->child_package_id,
        'child_patient_id' => $request->child_patient_id,
      ]);
      return redirect()->route('request_success', $request_obj->id)
          ->with('success', 'تم انشاء طلبكم بنجاح، في انتظار نتيجة الطلب في أقرب وقت!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildDiscountRequest  $childDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ChildDiscountRequest $childDiscountRequest)
    {
        return view('child_discount_requests.show',compact('childDiscountRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildDiscountRequest  $childDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildDiscountRequest $childDiscountRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildDiscountRequest  $childDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildDiscountRequest $childDiscountRequest)
    {
        DB::beginTransaction(); // Start the transaction
        try {
            $childDiscountRequest->update([
              'status' => $request->status,
            ]);

            if($request->status == 1){
              $childDiscountRequest->child_package->update([
                'discount' => $request->discount,
                'rest' => $request->cost - $request->discount - $request->paid,
              ]);
            }

            DB::commit();      //End transaction
            $tabindex = 2;
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
     * @param  \App\Models\ChildDiscountRequest  $childDiscountRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildDiscountRequest $childDiscountRequest)
    {
        //
    }
}
