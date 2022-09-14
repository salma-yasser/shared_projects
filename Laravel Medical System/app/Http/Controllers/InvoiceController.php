<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdultPatientInvoice;
use App\Models\ChildPatientInvoice;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class InvoiceController extends Controller
{

  /**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{

}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
  return view('invoices.create');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{

}

/**
* Display the specified resource.
*
* @param  \App\Invoice  $invoice
* @return \Illuminate\Http\Response
*/
public function show($invoices)
{
    $invoice_ids= array_unique(explode("-", $invoices));

    $invoices= DB::table('invoices')
      ->wherein('id',$invoice_ids)
      ->get();

    $total_paid = array_sum($invoices->pluck("paid")->toArray());
    $total_vat = array_sum($invoices->pluck("vat")->toArray());

    $qrcode = QrCode::size(200)->generate(url('/invoices/'.$invoices));

    return view('invoices.show',compact('invoices','qrcode', 'total_paid', 'total_vat'));
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\Invoice  $invoice
* @return \Illuminate\Http\Response
*/
public function edit(Invoice $invoice)
{
  return view('invoices.edit',compact('invoice'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Invoice  $invoice
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Invoice $invoice)
{
  $request->validate([
      'name' => 'required',
      'detail' => 'required',
  ]);
  $invoice->update($request->all());
  return redirect()->route('invoices.index')
                  ->with('success','Invoice updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param  \App\Invoice  $invoice
* @return \Illuminate\Http\Response
*/
public function destroy(Invoice $invoice)
{
  $invoice->delete();
  return redirect()->route('invoices.index')
                  ->with('success','Invoice deleted successfully');
}
}
