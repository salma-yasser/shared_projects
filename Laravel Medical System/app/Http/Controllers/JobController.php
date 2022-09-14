<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $jobs = Job::all();
    return view('jobs.index',compact('jobs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('jobs.create');
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
         return redirect()->route('jobs.index')
                     ->withErrors($validator, 'add_job')
                     ->withInput();
      }

      Job::create($request->all());
      return redirect()->route('jobs.index')
            ->with('success','تم إضافة البيانات الجديده بنجاح');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Job  $job
   * @return \Illuminate\Http\Response
   */
  public function show(Job $job)
  {
      return view('jobs.show',compact('job'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Job  $job
   * @return \Illuminate\Http\Response
   */
  public function edit(Job $job)
  {
      return view('jobs.edit',compact('job'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Job  $job
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Job $job)
  {
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'max:255'],
      ]);

      if ($validator->fails()) {
         return redirect()->route('jobs.index')
                     ->withErrors($validator, 'edit_job')
                     ->withInput();
      }

      $job->update($request->all());
      return redirect()->route('jobs.index')
              ->with('success','تم تحديث البيانات بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Job  $job
   * @return \Illuminate\Http\Response
   */
  public function destroy(Job $job)
  {
      $job->delete();
      return redirect()->route('jobs.index')
              ->with('success','تم حذف البيانات بنجاح');
  }
}
