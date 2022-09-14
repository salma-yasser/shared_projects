<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $contract_types = ContractType::all();
    return view('contract_types.index',compact('contract_types'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('contract_types.create');
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
          'name' => ['required', 'string', 'max:255'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('contract_types.index')
                     ->withErrors($validator, 'add_contract_type')
                     ->withInput();
      }

      ContractType::create($request->all());
      return redirect()->route('contract_types.index')
            ->with('success','تم إضافة البيانات الجديده بنجاح');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ContractType  $contract_type
   * @return \Illuminate\Http\Response
   */
  public function show(ContractType $contract_type)
  {
      return view('contract_types.show',compact('contract_type'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ContractType  $contract_type
   * @return \Illuminate\Http\Response
   */
  public function edit(ContractType $contract_type)
  {
      return view('contract_types.edit',compact('contract_type'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ContractType  $contract_type
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ContractType $contract_type)
  {
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'max:255'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('contract_types.index')
                     ->withErrors($validator, 'edit_contract_type')
                     ->withInput();
      }

      $contract_type->update($request->all());
      return redirect()->route('contract_types.index')
              ->with('success','تم تحديث البيانات بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ContractType  $contract_type
   * @return \Illuminate\Http\Response
   */
  public function destroy(ContractType $contract_type)
  {
      $contract_type->delete();
      return redirect()->route('contract_types.index')
              ->with('success','تم حذف البيانات بنجاح');
  }
}
