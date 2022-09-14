<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\StickyNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StickyNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sticky_notes= StickyNotes::where('employee_id', Auth::user()->id)->get();
        return view('home',compact('sticky_notes'));
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

            StickyNotes::create([

                'employee_id' => Auth::user()->id,
                'note_title' => $request->note_title,
                'note_description' => $request->note_description,

            ]);



            DB::commit();      //End transaction
//            return view('home')->with('success', 'sticky note saved successfully');
            return redirect()->route('home')
                ->with('success', 'Sticky note saved successfully');
        }catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('error-500');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sticky_notes  $sticky_notes
     * @return \Illuminate\Http\Response
     */
    public function show(StickyNotes $StickyNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sticky_notes  $sticky_notes
     * @return \Illuminate\Http\Response
     */
    public function edit(StickyNotes $StickyNotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sticky_notes  $sticky_notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StickyNotes $StickyNotes)
    {
      

            $StickyNotes->update([
                'note_title' => $request->note_title,
                'note_description' => $request->note_description,
     ]);

dd($StickyNotes->note_title);

         
            return redirect()->route('home')
              ->with('success', 'Sticky note updated successfully');
      
     
  
  
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sticky_notes  $sticky_notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(StickyNotes $StickyNotes)
    {
        $StickyNotes->delete();
    return redirect()->route('home')
          ->with('success','sticky note deleted'); 
    }
}
