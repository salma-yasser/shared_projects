<?php

namespace App\Http\Controllers;

use App\Models\AdultDiscountRequest;
use App\Models\AdultCancelRequest;
use App\Models\AdultExtraRebookRequest;
use App\Models\AdultChangeAppointmentRequest;
use Illuminate\Http\Request;

class AdultRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tabindex = 1)
    {
      $discounts = AdultDiscountRequest::all();
      $cancels = AdultCancelRequest::all();
      $extra_rebooks = AdultExtraRebookRequest::all();
      $change_appointments = AdultChangeAppointmentRequest::all();
      return view('adult_requests.index',compact('tabindex', 'discounts', 'cancels', 'extra_rebooks', 'change_appointments'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
