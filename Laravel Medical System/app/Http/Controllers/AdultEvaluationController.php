<?php

namespace App\Http\Controllers;

use App\Models\AdultEvaluation;
use App\Models\AdultPatient;
use App\Models\AdultEvaluationFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use File;

class AdultEvaluationController extends Controller
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
    public function createEvaluation(AdultPatient $adult_patient)
    {
        return view('adult_evaluations.create', compact('adult_patient'));
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
            $request->merge(["smoke" => isset($request['smoke'])?true:false]);
            $request->merge(["pregnant" => isset($request['pregnant'])?true:false]);
            $request->merge(["pacemaker" => isset($request['pacemaker'])?true:false]);
            $request->merge(["if_any_surgery" => isset($request['if_any_surgery'])?true:false]);

//            $request->merge(["decreases_makes" => isset($request['decreases_makes'])?implode(",", $request->input('decreases_makes', [])):null]);
//            $request->merge(["increases_makes" => isset($request['increases_makes'])?implode(",", $request->input('increases_makes', [])):null]);
//            $request->merge(["previous_intervention" => isset($request['previous_intervention'])?implode(",", $request->input('previous_intervention', [])):null]);
//            $request->merge(["following_today" => isset($request['following_today'])?implode(",", $request->input('following_today', [])):null]);

            if(isset($request->previous_interventiony_file_path)){
                $file = $request->file('previous_interventiony_file_path');
                $filename = $request->adult_patient_id.'_previous_interventiony_file.'.$file->extension();
                $request->merge([
                    'previous_interventiony_file' => ('adult_patients/'.$request->adult_patient_id.'/evaluation_files/'. $filename)
                ]);
                $file->move(storage_path('app/public/adult_patients/'.$request->adult_patient_id.'/evaluation_files/'), $filename);
            }

            $adult_evaluation = AdultEvaluation::create($request->all());

            if (isset($request['evaluation_document'])) {
                $this->addEvaluationFiles($adult_evaluation, $request->adult_patient_id, $request->input('evaluation_document', []) );
            }
            DB::commit();      //End transaction
            return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 5])
                ->with('success','تم إضافة التقييم بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('error-500');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  AdultEvaluation $adult_evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(AdultEvaluation $adult_evaluation)
    {
      return view('adult_evaluations.show',compact('adult_evaluation'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\AdultEvaluation  $adult_package
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, AdultEvaluation $adult_evaluation)
    {
      $validator = Validator::make($request->all(), [
            'file_path' => ['required']
        ]);

        if ($validator->fails()) {
           return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 5])
                       ->withErrors($validator, 'edit_evaluation')
                       ->withInput();
        }

        if(isset($request->file_path)){
          $file = $request->file('file_path');
          $filename = $request->adult_patient_id.'_evaluation.'.$file->extension();
          $adult_evaluation->update([
            'file_path' => ('adult_patients/'.$request->adult_patient_id.'/evaluation_file/'. $filename)
          ]);
          $file->move(storage_path('app/public/adult_patients/'.$request->adult_patient_id.'/evaluation_file/'), $filename);
        }


        return redirect()->route('adult_patients.show', ['adult_patient' => $request->adult_patient_id, 'tabindex' => 5])
              ->with('success','تم تحديث التقييم بنجاح');
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


    private function addEvaluationFiles($adult_evaluation, $adult_id , $files){
        $file_path = 'adult_patients/'.$adult_id.'/evaluation_files/';
        $new_path = storage_path('app/public/'.$file_path);
        if (!file_exists($new_path)) {
            mkdir($new_path, 0777, true);
        }

        foreach ($files as $file_name) {
            $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
            $new_path = $new_path.$file_name;

            File::move($old_path, $new_path);

            AdultEvaluationFile::create([
                'adult_evaluation_id' =>  $adult_evaluation->id,
                'file_path' => ($file_path.$file_name)
            ]);
        }
    }
}
