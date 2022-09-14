<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditInvoice;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CreditInvoiceController extends Controller
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
  return view('credit_invoices.create');
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
* @param  \App\CreditInvoice  $credit_invoice
* @return \Illuminate\Http\Response
*/
public function show(CreditInvoice $credit_invoice)
{
    $qrcode = QrCode::size(200)->generate(url('/invoices/'.$credit_invoice->invoice_id));
  return view('credit_invoices.show',compact('credit_invoice','qrcode'));
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\CreditInvoice  $credit_invoice
* @return \Illuminate\Http\Response
*/
public function edit(CreditInvoice $credit_invoice)
{
  return view('credit_invoices.edit',compact('credit_invoice'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\CreditInvoice  $credit_invoice
* @return \Illuminate\Http\Response
*/
public function update(Request $request, CreditInvoice $credit_invoice)
{
  $request->validate([
      'name' => 'required',
      'detail' => 'required',
  ]);
  $credit_invoice->update($request->all());
  return redirect()->route('credit_invoices.index')
                  ->with('success','CreditInvoice updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param  \App\CreditInvoice  $credit_invoice
* @return \Illuminate\Http\Response
*/
public function destroy(CreditInvoice $credit_invoice)
{
  $credit_invoice->delete();
  return redirect()->route('credit_invoices.index')
                  ->with('success','CreditInvoice deleted successfully');
}
}
