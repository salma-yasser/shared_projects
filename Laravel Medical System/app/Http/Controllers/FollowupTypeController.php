<?php

namespace App\Http\Controllers;

use App\Models\FollowupType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FollowupTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $followup_types = FollowupType::all();
    return view('followup_types.index',compact('followup_types'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('followup_types.create');
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
         return redirect()->route('followup_types.index')
                     ->withErrors($validator, 'add_followup_type')
                     ->withInput();
      }

      FollowupType::create($request->all());
      return redirect()->route('followup_types.index')
            ->with('success','تم إضافة البيانات الجديده بنجاح');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\FollowupType  $followup_type
   * @return \Illuminate\Http\Response
   */
  public function show(FollowupType $followup_type)
  {
      return view('followup_types.show',compact('followup_type'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\FollowupType  $followup_type
   * @return \Illuminate\Http\Response
   */
  public function edit(FollowupType $followup_type)
  {
      return view('followup_types.edit',compact('followup_type'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\FollowupType  $followup_type
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, FollowupType $followup_type)
  {
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'max:255'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('followup_types.index')
                     ->withErrors($validator, 'edit_followup_type')
                     ->withInput();
      }

      $followup_type->update($request->all());
      return redirect()->route('followup_types.index')
              ->with('success','تم تحديث البيانات بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\FollowupType  $followup_type
   * @return \Illuminate\Http\Response
   */
  public function destroy(FollowupType $followup_type)
  {
      $followup_type->delete();
      return redirect()->route('followup_types.index')
              ->with('success','تم حذف البيانات بنجاح');
  }
}
