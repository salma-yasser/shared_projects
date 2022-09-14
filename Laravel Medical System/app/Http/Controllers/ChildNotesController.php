<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ChildNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChildNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $child_notes= ChildNotes::latest()->paginate(10);
        return view('child_notes.index',compact('child_notes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
        DB::beginTransaction(); // Start the transaction
        try {

            ChildNotes::create([

                'employee_id' => Auth::user()->id,
                'child_patient_id'=> $request->note_title,
                'note_type' => $request->note_type,
                'note_description' => $request->note_description,

            ]);



            DB::commit();      //End transaction
        return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 7])
            ;
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildNotes  $childNotes
     * @return \Illuminate\Http\Response
     */
    public function show(ChildNotes $childNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildNotes  $childNotes
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildNotes $childNotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildNotes  $childNotes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildNotes $childNotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildNotes  $childNotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildNotes $childNotes)
    {
        //
    }
}
