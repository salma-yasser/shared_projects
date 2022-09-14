<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\adultNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdultNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adult_notes= AdultNotes::latest()->paginate(10);
        return view('adult_notes.index',compact('adult_notes'))
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

            AdultNotes::create([

                'employee_id' => Auth::user()->id,
                'adult_patient_id'=> $request->adult_patient_id,
                'note_type' => $request->note_type,
                'note_description' => $request->note_description,

            ]);



            DB::commit();      //End transaction
        return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 7]);
           
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adultNotes  $adultNotes
     * @return \Illuminate\Http\Response
     */
    public function show(adultNotes $adultNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adultNotes  $adultNotes
     * @return \Illuminate\Http\Response
     */
    public function edit(adultNotes $adultNotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adultNotes  $adultNotes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adultNotes $adultNotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adultNotes  $adultNotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(adultNotes $adultNotes)
    {
        //
    }
}
