<?php

namespace App\Http\Controllers;

use App\Models\AdultRevaluation;
use App\Models\AdultRevaluationFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use File;

class AdultRevaluationController extends Controller
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

            if (isset($request['revaluation_document'])) {
                $adult_revaluation = AdultRevaluation::create([
                    'adult_patient_id' =>  $request->adult_patient_id
                ]);
                $this->addRevaluationFiles($adult_revaluation, $request->adult_patient_id, $request->input('revaluation_document', []) );
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
    * @param  \App\AdultRevaluation  $adult_package
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, AdultRevaluation $adult_revaluation)
    {
        $validator = Validator::make($request->all(), [
              'file_path' => ['required']
          ]);

          if ($validator->fails()) {
             return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 5])
                         ->withErrors($validator, 'edit_revaluation')
                         ->withInput();
          }

          if(isset($request->file_path)){
            $file = $request->file('file_path');
            $filename = $request->adult_patient_id.'_'.time().'_revaluation'.$file->extension();
            $adult_revaluation->update([
              'file_path' => ('adult_patients/'.$request->adult_patient_id.'/revaluation_file/'. $filename)
            ]);
            $file->move(storage_path('app/public/adult_patients/'.$request->adult_patient_id.'/revaluation_file/'), $filename);
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


    private function addRevaluationFiles($adult_revaluation, $adult_id , $files){
        $file_path = 'adult_patients/'.$adult_id.'/revaluation_files/';
        $new_path = storage_path('app/public/'.$file_path);
        if (!file_exists($new_path)) {
            mkdir($new_path, 0777, true);
        }

        foreach ($files as $file_name) {
            $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
            $new_path = $new_path.$file_name;

            File::move($old_path, $new_path);

            AdultRevaluationFile::create([
                'adult_revaluation_id' =>  $adult_revaluation->id,
                'file_path' => ($file_path.$file_name)
            ]);
        }
    }
}
