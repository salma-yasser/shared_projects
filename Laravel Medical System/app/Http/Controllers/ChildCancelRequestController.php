<?php

namespace App\Http\Controllers;

use App\Models\ChildCancelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ChildCancelRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $child_cancel_requests = ChildCancelRequest::all();
      // return view('child_cancel_requests.index',compact('child_cancel_requests'));
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
          'child_package_id' => ['required', 'unique:child_cancel_requests'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 3])
                     ->withErrors($validator, 'request_cancel_package')
                     ->withInput();
      }

      $request_obj = ChildCancelRequest::create([
        'child_package_id' => $request->child_package_id,
        'child_patient_id' => $request->child_patient_id,
      ]);
      return redirect()->route('request_success', $request_obj->id)
          ->with('success', 'تم انشاء طلبكم بنجاح، في انتظار نتيجة الطلب في أقرب وقت!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildCancelRequest  $childCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ChildCancelRequest $childCancelRequest)
    {
        return view('child_cancel_requests.show',compact('childCancelRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildCancelRequest  $childCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildCancelRequest $childCancelRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildCancelRequest  $childCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildCancelRequest $childCancelRequest)
    {
        DB::beginTransaction(); // Start the transaction
        try {
            $childCancelRequest->update([
              'status' => $request->status,
            ]);

            if($request->status == 1){
              $childCancelRequest->child_package->update([
                'status' => config('enums.patient_package_status_values.cancelled'),
                'refund' => $request->refund,
              ]);
            }

            DB::commit();      //End transaction
            $tabindex = 1;
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
     * @param  \App\Models\ChildCancelRequest  $childCancelRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildCancelRequest $childCancelRequest)
    {
        //
    }
}
