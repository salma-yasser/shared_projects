<?php

namespace App\Http\Controllers;

use App\Models\AdultProgram;
use App\Models\AdultProgramFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use File;

class AdultProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            if (isset($request['program_document'])) {
                $adult_program = AdultProgram::create([
                    'adult_patient_id' =>  $request->adult_patient_id
                ]);
                $this->addProgramFiles($adult_program, $request->adult_patient_id, $request->input('program_document', []) );
            }
            DB::commit();      //End transaction
            return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 5])
                ->with('success','تم إضافة إعادة التقييم بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('error-500');
        }
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
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\AdultProgram  $adult_package
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, AdultProgram $adult_program)
    {
        $validator = Validator::make($request->all(), [
              'file_path' => ['required']
          ]);

          if ($validator->fails()) {
             return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 5])
                         ->withErrors($validator, 'edit_program')
                         ->withInput();
          }

          if(isset($request->file_path)){
            $file = $request->file('file_path');
            $filename = $request->adult_patient_id.'_'.time().'_program'.$file->extension();
            $adult_program->update([
              'file_path' => ('adult_patients/'.$request->adult_patient_id.'/program_file/'. $filename)
            ]);
            $file->move(storage_path('app/public/adult_patients/'.$request->adult_patient_id.'/program_file/'), $filename);
          }

          return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 5])
                ->with('success','تم تحديث اعادة التقييم بمجاح');
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


    private function addProgramFiles($adult_program, $adult_id , $files){
        $file_path = 'adult_patients/'.$adult_id.'/program_files/';
        $new_path = storage_path('app/public/'.$file_path);
        if (!file_exists($new_path)) {
            mkdir($new_path, 0777, true);
        }

        foreach ($files as $file_name) {
            $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
            $new_path = $new_path.$file_name;

            File::move($old_path, $new_path);

            AdultProgramFile::create([
                'adult_program_id' =>  $adult_program->id,
                'file_path' => ($file_path.$file_name)
            ]);
        }
    }
}
