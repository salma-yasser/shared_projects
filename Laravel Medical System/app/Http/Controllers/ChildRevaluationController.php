<?php

namespace App\Http\Controllers;

use App\Models\ChildRevaluation;
use App\Models\ChildRevaluationFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use File;

class ChildRevaluationController extends Controller
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
            $child_department = json_decode($request->child_department);

            if (isset($request['revaluation_document'])) {
                $child_revaluation = ChildRevaluation::create([
                    'child_department_id' =>  $child_department->id
                ]);
                $this->addRevaluationFiles($child_revaluation, $child_department->id, $request->input('revaluation_document', []) );
            }
            DB::commit();      //End transaction
            return redirect()->route('child_patients.show', ['child_patient' => $child_department->child_patient_id, 'tabindex' => 5])
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
    * @param  \App\ChildRevaluation  $child_package
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, ChildRevaluation $child_revaluation)
    {
        DB::beginTransaction(); // Start the transaction
        try {
            if (isset($request['revaluation_document'])) {
                $file_path = 'child_patients/'.$request->child_department_id.'/revaluation_files/';

                // delete old files
                foreach ($child_revaluation->child_revaluation_files as $file) {
                    unlink(storage_path('app/public/' . $file_path . $file->file_path));
                }
                $child_revaluation->child_revaluation_files->delete();

                // add new files
                $this->addRevaluationFiles($child_revaluation, $request->child_department_id, $request->input('revaluation_document', []));
            }
            DB::commit();      //End transaction
            return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 5])
                ->with('success','تم تحديث اعادة التقييم بمجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('error-500');
        }
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

    private function addRevaluationFiles($child_revaluation, $child_department_id , $files){
        $file_path = 'child_patients/'.$child_department_id.'/revaluation_files/';
        $new_path = storage_path('app/public/'.$file_path);
        if (!file_exists($new_path)) {
            mkdir($new_path, 0777, true);
        }

        foreach ($files as $file_name) {
            $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
            $new_path = $new_path.$file_name;

            File::move($old_path, $new_path);

            ChildRevaluationFile::create([
                'child_revaluation_id' =>  $child_revaluation->id,
                'file_path' => ($file_path.$file_name)
            ]);
        }
    }
}
