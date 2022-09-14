<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\DepartmentType;
use App\Models\Nationality;
use App\Models\BloodType;
use App\Models\Job;
use App\Models\ContractType;
use App\Models\ContractFile;
use App\Models\FollowupType;
use App\Models\EmployeeFollowup;
use App\Models\EmployeeFile;
use App\Models\EmpWorkingTime;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departments = Department::all();
      // $employees = Employee::latest()->paginate(5);
      $employees = Employee::where("id","!=",1)->where('exist',1)->get();
      return view('employees.index', compact('employees','departments'));
          // ->with('i', (request()->input('page', 1) - 1) * 1);
    }

    public function filter(Request $request)
    {
      $exist = $request->input('exist');
      $selected_departments = $request->input('specialist');

      if($exist == null){
        $employees = [];
      }elseif($exist == 'all'){
          $employees = Employee::with(['job','department'])->whereIn('department_id', $selected_departments)
          ->where("id","!=",1)->get();//->latest()->paginate(5);
      }else{
          $employees = Employee::with(['job','department'])->whereIn('department_id', $selected_departments)
          ->where("id","!=",1)
          ->where('exist',$exist==1?true:false)->get();//->latest()->paginate(5);
      }

      return new JsonResponse($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities = Nationality::all();
        $bloodtypes = BloodType::all();
        $department_types = DepartmentType::all();
        $jobs = Job::all();
        $contracttypes = ContractType::all();
        $employee_followups = EmployeeFollowup::all();
        $followupTypes = FollowupType::all();
        return view('employees.create', compact('nationalities','bloodtypes','department_types','jobs','contracttypes','employee_followups','followupTypes'));
    }


    public function storeMedia(Request $request)
    {
        $path = storage_path('app/public/tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function removeTempFile(Request $request){
        $file = $request->input('file');
        if (file_exists('app/public/tmp/uploads/'.$file)) {
            unlink(storage_path('app/public/tmp/uploads/'.$file));
        }
    }

    public function removeFollowUp(Request $request)
    {
        $follow_id = $request->input('follow_id');
        $followup = EmployeeFollowup::find($follow_id);
        // unlink(storage_path('app/public/tmp/uploads/'.$file));
        $followup->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'photo' => ['nullable', 'image', 'max:2048'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required','unique:employees'],
            'mobile' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
            'birthdate' => ['nullable','string', 'max:255'],
            'nationality_id' => ['required'],
            'address' => ['nullable','string', 'max:255'],
            'kind' => ['required'],
            'marital_status' => ['required'],
            'emp_no' => ['required','unique:employees'],
            'department_id' => ['required'],
            'job_id' => ['required'],
            'qualification' => ['nullable','string', 'max:255'],
            'experience' => ['nullable','integer'],
            'entry_date' => ['nullable','string', 'max:255'],
            'border_no' => ['nullable','string', 'max:255'],
            'sa_id' => ['nullable','string', 'max:255'],
            'sa_file' => ['nullable','mimes:pdf,jpg,png'],
            'contract_type_id' => ['required'],
            'contract_expire_date' => ['nullable','string', 'max:255'],
            'salary' => ['required', 'integer'],
            'contract_file' => ['nullable','mimes:pdf,jpg,png'],
            'bank_name' => ['nullable','string', 'max:255'],
            'iban' => ['nullable','string', 'max:255'],
            'bank_file' => ['nullable','mimes:pdf,jpg,png'],
            'license_number' => ['nullable','string', 'max:255'],
            'license_issue_date' => ['nullable','string', 'max:255'],
            'license_end_date' => ['nullable', 'string', 'max:255'],
            'license_file' => ['nullable','mimes:pdf,jpg,png'],
            'dataflow_no' => ['nullable','string', 'max:255'],
            'dataflow_file' => ['nullable','mimes:pdf,jpg,png'],
            'followup_type_id.*' => ['required'],
            'followups_date.*' => ['required','date_format:"d/m/Y'],
      			'followups_name.*' => ['nullable','string', 'max:255'],
      			'followups_file.*' => ['nullable','mimes:pdf,jpg,png'],
        ]);

        DB::beginTransaction(); // Start the transaction
        try {
            // Prepare Request
            $fullname_array = explode(' ', trim($request->fullname));
            if(isset($request['medical_insurance'])){
              $request->merge(["medical_insurance" => true]);
            }
            if (isset($request['sa_file'])) {
              $file = $request->file('sa_file');
              $filename = time().'_'.$file->getClientOriginalName();
              $file->move(storage_path('app/public/sa_files/'), $filename);
              $request->merge(["sa_file_path" => "sa_files/".$filename, "sa_file_name" => $file->getClientOriginalName()]);
            }
            if (isset($request['contract_file'])) {
              $file = $request->file('contract_file');
              $filename = time().'_'.$file->getClientOriginalName();
              $file->move(storage_path('app/public/contract_files/'), $filename);
              $request->merge(["contract_file_path" => "contract_files/".$filename, "contract_file_name" => $file->getClientOriginalName()]);
            }
            if (isset($request['license_file'])) {
              $file = $request->file('license_file');
              $filename = time().'_'.$file->getClientOriginalName();
              $file->move(storage_path('app/public/license_files/'), $filename);
              $request->merge(["license_file_path" => "license_files/".$filename, "license_file_name" => $file->getClientOriginalName()]);
            }
            if (isset($request['dataflow_file'])) {
              $file = $request->file('dataflow_file');
              $filename = time().'_'.$file->getClientOriginalName();
              $file->move(storage_path('app/public/dataflow_files/'), $filename);
              $request->merge(["dataflow_file_path" => "dataflow_files/".$filename, "dataflow_file_name" => $file->getClientOriginalName()]);
            }

            //Save Employee
            $employee = Employee::create($request->all() +
              ['name' => $fullname_array[0].(count($fullname_array)>1?" ".$fullname_array[1].(count($fullname_array)>2?" ".$fullname_array[count($fullname_array)-1]:""):""),
              'password' => Hash::make("12345678")//Str::random(8))
            ]);

            if (isset($request['photo'])) {
              $employee->updateProfilePhoto($request['photo']);
            }

            // Save multiple files
            if (isset($request['file_document'])) {
              $file_path = 'employee_files/';
              $new_path = storage_path('app/public/'.$file_path);
              if (!file_exists($new_path)) {
                  mkdir($new_path, 0777, true);
              }
              foreach ($request->input('file_document', []) as $file_name) {
                $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
                $new_path = $new_path.$file_name;
                File::move($old_path, $new_path);
                $employee->employee_files()->create([
                  'file_path' => $file_path.$file_name,
                  'file_name' => substr(strstr($file_name, '_'), 1)
              ]);
              }
            }
            if (isset($request['followup_id'])) {
                $followup_ids = $request->input('followup_id', []);
                $followup_type_ids = $request->input('followup_type_id', []);
                $followups_names = $request->input('followups_name', []);
                $followups_dates = $request->input('followups_date', []);
                $followups_files = $request->file('followups_file', []);

                for($i=0; $i<count($followup_ids);$i++){
                  if(!array_key_exists($i,$followup_ids)){
                    continue;
                  }
                  //Save File
                  $file_name = $location = $file_path = null;
                  if(isset($followups_files[$i])){
                    $file_name = time().'_'.$followups_files[$i]->getClientOriginalName();
                    $location = storage_path('app/public/followup_files/');
                    $file_path = 'followup_files/'.$file_name;
                    $followups_files[$i]->move($location, $file_name);
                  }
                  // Save Database
                  $employee->employee_followups()->create([
                      'followup_type_id' => $followup_type_ids[$i],
                      'name' => $followups_names[$i],
                      'date' => $followups_dates[$i],
                      'file_path' => $file_path
                  ]);
                }
              }
            // Working Hours
            EmpWorkingTime::create([
              'employee_id' => $employee->id
            ]);
          DB::commit();      //End transaction
          //// TODO: Send email
          return redirect()->route('employees.show', $employee->id)
              ->with('status', 'تم إضافة الموظف الجديد بنجاح');
          } catch (Exception $e) {
              DB::rollBack();
              return redirect()->route('error-500');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee, $tabindex = 1)
    {
      $nationalities = Nationality::all();
      $bloodtypes = BloodType::all();
      $department_types = DepartmentType::all();
      $jobs = Job::all();
      $contracttypes = ContractType::all();
      $employee_followups = EmployeeFollowup::where('employee_id', $employee->id)->orderBy('date')->get();
      $followupTypes = FollowupType::all();
      return view('employees.show', compact('employee','tabindex','nationalities','bloodtypes','department_types','jobs','contracttypes','employee_followups','followupTypes'));
        // return view('employees.show', compact('employee','tabindex'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        switch ($request->details_type) {
          case 'personal':
            $validator = Validator::make($request->all(), [
                'photo' => ['nullable', 'image', 'max:2048'],
                'fullname' => ['required', 'string', 'max:255'],
                'email' => ['required', Rule::unique('employees')->ignore($employee->id)],
                'mobile' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
                'birthdate' => ['nullable','string', 'max:255'],
                'nationality_id' => ['required'],
                'address' => ['nullable','string', 'max:255'],
                'kind' => ['required'],
                'marital_status' => ['required'],
                ]);

                if ($validator->fails()) {
                   return redirect()->route('employees.show', $employee->id)
                               ->withErrors($validator, 'personal')
                               ->withInput();
                }

              if (isset($request['photo'])) {
                $employee->updateProfilePhoto($request['photo']);
              }
            break;

          case 'working':
            $validator = Validator::make($request->all(), [
              'emp_no' => ['required', Rule::unique('employees')->ignore($employee->id)],
              'department_id' => ['required'],
              'job_id' => ['required'],
              'qualification' => ['nullable','string', 'max:255'],
              'experience' => ['nullable','integer'],
              'entry_date' => ['nullable','string', 'max:255'],
              'border_no' => ['nullable','string', 'max:255'],
                ]);

            if ($validator->fails()) {
               return redirect()->route('employees.show', $employee->id)
                           ->withErrors($validator, 'working')
                           ->withInput();
            }

            if(isset($request['medical_insurance'])){
              $request->merge(["medical_insurance" => true]);
            }else{
              $request->merge(["medical_insurance" => false]);
            }
            break;

          case 'sa':
          $validator = Validator::make($request->all(), [
            'sa_id' => ['nullable','string', 'max:255'],
              ]);

          if ($validator->fails()) {
             return redirect()->route('employees.show', $employee->id)
                         ->withErrors($validator, 'sa')
                         ->withInput();
          }
          if (isset($request['sa_document'])) {
              $file_path = 'sa_files/';
              $file_name = $request->input('sa_document', [])[0];
              $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
              $new_path = storage_path('app/public/'.$file_path);
              if (!file_exists($new_path)) {
                  mkdir($new_path, 0777, true);
              }
              $new_path = $new_path.$file_name;
              // store new file
              if (file_exists($old_path)) {
                if(!is_null($employee->sa_file_path) && !empty($employee->sa_file_path)){
                    unlink(storage_path('app/public/'.$employee->sa_file_path));
                  }
                  File::move($old_path, $new_path);
                  $employee->fill([
                    'sa_file_path' => $file_path.$file_name,
                    'sa_file_name' => substr(strstr($file_name, '_'), 1)
                ]);
              }
            }else if(!is_null($employee->sa_file_path) && !empty($employee->sa_file_path)){   //user delete the stored file
                unlink(storage_path('app/public/'.$employee->sa_file_path));
                $employee->fill([
                  'sa_file_path' => null,
                  'sa_file_name' => null
              ]);
            }
            break;

            case 'contract':
            $validator = Validator::make($request->all(), [
               'contract_type_id' => ['required'],
               'contract_expire_date' => ['nullable','string', 'max:255'],
               'salary' => ['required', 'integer'],
                ]);

            if ($validator->fails()) {
               return redirect()->route('employees.show', $employee->id)
                           ->withErrors($validator, 'contract')
                           ->withInput();
            }

            if (isset($request['contract_document'])) {
                $file_path = 'contract_files/';
                $file_name = $request->input('contract_document', [])[0];
                $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
                $new_path = storage_path('app/public/'.$file_path);
                if (!file_exists($new_path)) {
                    mkdir($new_path, 0777, true);
                }
                $new_path = $new_path.$file_name;
                // store new file
                if (file_exists($old_path)) {
                    if(!is_null($employee->contract_file_path) && !empty($employee->contract_file_path)){
                      unlink(storage_path('app/public/'.$employee->contract_file_path));
                    }
                    File::move($old_path, $new_path);
                    $employee->fill([
                      'contract_file_path' => $file_path.$file_name,
                      'contract_file_name' => substr(strstr($file_name, '_'), 1)
                  ]);
                }
              }else if(!is_null($employee->contract_file_path) && !empty($employee->contract_file_path)){   //user delete the stored file
                  unlink(storage_path('app/public/'.$employee->contract_file_path));
                  $employee->fill([
                    'contract_file_path' => null,
                    'contract_file_name' => null
                ]);
              }
              break;

            case 'license':
            $validator = Validator::make($request->all(), [
              'license_number' => ['nullable','string', 'max:255'],
              'license_issue_date' => ['nullable','string', 'max:255'],
              'license_end_date' => ['nullable','string', 'max:255'],
                ]);

            if ($validator->fails()) {
               return redirect()->route('employees.show', $employee->id)
                           ->withErrors($validator, 'license')
                           ->withInput();
            }

            if (isset($request['license_document'])) {
                $file_path = 'license_files/';
                $file_name = $request->input('license_document', [])[0];
                $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
                $new_path = storage_path('app/public/'.$file_path);
                if (!file_exists($new_path)) {
                    mkdir($new_path, 0777, true);
                }
                $new_path = $new_path.$file_name;
                // store new file
                if (file_exists($old_path)) {
                    if(!is_null($employee->license_file_path) && !empty($employee->license_file_path)){
                      unlink(storage_path('app/public/'.$employee->license_file_path));
                    }
                    File::move($old_path, $new_path);
                    $employee->fill([
                      'license_file_path' => $file_path.$file_name,
                      'license_file_name' => substr(strstr($file_name, '_'), 1)
                  ]);
                }
              }else if(!is_null($employee->license_file_path) && !empty($employee->license_file_path)){   //user delete the stored file
                  unlink(storage_path('app/public/'.$employee->license_file_path));
                  $employee->fill([
                    'license_file_path' => null,
                    'license_file_name' => null
                ]);
              }
              break;

            case 'dataflow':
            $validator = Validator::make($request->all(), [
              'dataflow_no' => ['nullable','string', 'max:255'],
                ]);

            if ($validator->fails()) {
               return redirect()->route('employees.show', $employee->id)
                           ->withErrors($validator, 'dataflow')
                           ->withInput();
            }

            if (isset($request['dataflow_document'])) {
                $file_path = 'dataflow_files/';
                $file_name = $request->input('dataflow_document', [])[0];
                $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
                $new_path = storage_path('app/public/'.$file_path);
                if (!file_exists($new_path)) {
                    mkdir($new_path, 0777, true);
                }
                $new_path = $new_path.$file_name;
                // store new file
                if (file_exists($old_path)) {
                    if(!is_null($employee->dataflow_file_path) && !empty($employee->dataflow_file_path)){
                      unlink(storage_path('app/public/'.$employee->dataflow_file_path));
                    }
                    File::move($old_path, $new_path);
                    $employee->fill([
                      'dataflow_file_path' => $file_path.$file_name,
                      'dataflow_file_name' => substr(strstr($file_name, '_'), 1)
                  ]);
                }
              }else if(!is_null($employee->dataflow_file_path) && !empty($employee->dataflow_file_path)){   //user delete the stored file
                  unlink(storage_path('app/public/'.$employee->dataflow_file_path));
                  $employee->fill([
                    'dataflow_file_path' => null,
                    'dataflow_file_name' => null
                ]);
              }
              break;

            case 'add_file':
              if (isset($request['file_document'])) {
                $file_path = 'employee_files/';
                $new_path = storage_path('app/public/'.$file_path);
                if (!file_exists($new_path)) {
                    mkdir($new_path, 0777, true);
                }
                foreach ($request->input('file_document', []) as $file_name) {
                  $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
                  $new_path = $new_path.$file_name;
                  File::move($old_path, $new_path);
                  $employee->employee_files()->create([
                    'file_path' => $file_path.$file_name,
                    'file_name' => substr(strstr($file_name, '_'), 1)
                ]);
                }
              }
              break;

            case 'edit_file':
                $file = $request->file('updated_file');
                $filename = time().'_'.$file->getClientOriginalName();
                $location = storage_path('app/public/employee_files/');
                // Upload file
                $file->move($location, $filename);
                $employee_file = tap($employee->employee_files()->where('id', $request->file_id))->update([
                  'file_name' => $file->getClientOriginalName(),
                  'file_path' => 'employee_files/'.$filename
                ])->first();

                $data = [
                  "file_name" => pathinfo($employee_file->file_name, PATHINFO_FILENAME),
                  "file_path" => $employee_file->file_path,
                  "updated_at" => $employee_file->updated_at
                ];
                return $data;
              break;

            case 'followup':
            $validator = Validator::make($request->all(), [
              'followup_type_id.*' => ['required'],
              'followups_date.*' => ['required','date_format:"d/m/Y'],
        			'followups_name.*' => ['nullable','string', 'max:255'],
        			'followups_file.*' => ['nullable','mimes:pdf,jpg,png'],
                ]);

            if ($validator->fails()) {
               return redirect()->route('employees.show', $employee->id)
                           ->withErrors($validator, 'followup')
                           ->withInput();
            }
              $followup_ids = $request->input('followup_id', []);
              $followup_type_ids = $request->input('followup_type_id', []);
              $followups_names = $request->input('followups_name', []);
              $followups_dates = $request->input('followups_date', []);
              $followups_files = $request->file('followups_file', []);
              $deleted_followups = $request->input('deleted_followups', []);

              DB::beginTransaction(); // Start the transaction
              try{
                for($i=0; $i<count($deleted_followups);$i++){
                    $employee->employee_followups()->where('id', $deleted_followups[$i])->delete();
                }

                for($i=0; $i<count($followup_ids);$i++){
                    if(!array_key_exists($i,$followup_ids)){
                      continue;
                    }
                    //Save File
                      $file_name = $location = $file_path = null;
                      if(isset($followups_files[$i])){
                        $file_name = time().'_'.$followups_files[$i]->getClientOriginalName();
                        $location = storage_path('app/public/followup_files/');
                        $file_path = 'followup_files/'.$file_name;
                        $followups_files[$i]->move($location, $file_name);
                      }

                      // Save Database
                      if(is_null($followup_ids[$i])){
                        $employee->employee_followups()->create([
                            'followup_type_id' => $followup_type_ids[$i],
                            'name' => $followups_names[$i],
                            'date' => $followups_dates[$i],
                            'file_path' => $file_path
                        ]);
                      }else{
                        if(is_null($file_path)){
                          tap($employee->employee_followups()->where('id', $followup_ids[$i]))->update([
                            'followup_type_id' => $followup_type_ids[$i],
                            'name' => $followups_names[$i],
                            'date' => Carbon::createFromFormat('d/m/Y', $followups_dates[$i])->format('Y-m-d')
                          ]);
                        }else{
                          $followup = $employee->employee_followups()->where('id', $followup_ids[$i])->first();
                          if($followup->file_path){
                            unlink(storage_path('app/public/'.$followup->file_path));
                          }
                          tap($employee->employee_followups()->where('id', $followup_ids[$i]))->update([
                            'followup_type_id' => $followup_type_ids[$i],
                            'name' => $followups_names[$i],
                            'date' => Carbon::createFromFormat('d/m/Y', $followups_dates[$i])->format('Y-m-d'),
                            'file_path' => $file_path
                          ]);
                        }

                      }
                  }
            DB::commit();      //End transaction

            return redirect()->route('employees.show', [$employee->id,2])
                ->with('status', 'تم تحديث بيانات الموظف بنجاح');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('error-500');
            }
              break;
          case 'bank':
          $validator = Validator::make($request->all(), [
             'bank_name' => ['nullable','string', 'max:255'],
             'iban' => ['nullable','string', 'max:255'],
              ]);

          if ($validator->fails()) {
             return redirect()->route('employees.show', $employee->id)
                         ->withErrors($validator, 'bank')
                         ->withInput();
          }
            if (isset($request['bank_document'])) {
                $file_path = 'bank_files/';
                $file_name = $request->input('bank_document', [])[0];
                $old_path = storage_path('app/public/tmp/uploads/'.$file_name);
                $new_path = storage_path('app/public/'.$file_path);
                if (!file_exists($new_path)) {
                    mkdir($new_path, 0777, true);
                }
                $new_path = $new_path.$file_name;
                // store new file
                if (file_exists($old_path)) {
                    if(!is_null($employee->bank_file_path) && !empty($employee->bank_file_path)){
                      unlink(storage_path('app/public/'.$employee->bank_file_path));
                    }
                    File::move($old_path, $new_path);
                    $employee->fill([
                      'bank_file_path' => $file_path.$file_name
                  ]);
                }
              }else if(!is_null($employee->bank_file_path) && !empty($employee->bank_file_path)){   //user delete the stored file
                  unlink(storage_path('app/public/'.$employee->bank_file_path));
                  $employee->fill([
                    'bank_file_path' => null
                ]);
              }
              break;
          default:
            // code...
            break;
        }

        $employee->fill($request->all())->save();

        return redirect()->route('employees.show', $employee->id)
            ->with('status', 'تم تحديث بيانات الموظف بنجاح');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeFile  $employee_file
     * @return \Illuminate\Http\Response
     */
    public function removeEmployeeFile(Request $request, EmployeeFile $employee_file){
      // dd($employee_file);
      if($employee_file != null){
          $employee_file->delete();
          unlink(storage_path('app/public/'.$employee_file->file_path));
          return redirect()->route('employees.show', $employee_file->employee_id)
            ->with('status', 'تم تحديث بيانات الموظف بنجاح');
        }
    }

    public function disableEmployee(Request $request, Employee $employee){
      $employee->exist=$request->exist=="true"?true:false;
      $employee->save();
      // if($employee->id == Auth::user()->id){
      //   Auth::logout();
      // }
      return redirect()->route('employees.show', $employee->id)
        ->with('status', 'تم تحديث بيانات الموظف بنجاح');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function changeWorkingTime(Request $request, Employee $employee)
    {
        $working_time_option = $request->input('working_time_option');
        $starting_time = $request->input('starting_time');
        $beginning = $request->input('beginning', []);
        $ending = $request->input('ending', []);

        EmpWorkingTime::create([
            'employee_id' => $employee->id,
            'type' => $working_time_option,
            'start_date' => $starting_time,
            'attend_time' => $beginning[0],
            'leave_time' => $ending[0],
        ]);

        if($working_time_option==2){
          EmpWorkingTime::create([
              'employee_id' => $employee->id,
              'type' => $working_time_option,
              'start_date' => $starting_time,
              'attend_time' => $beginning[1],
              'leave_time' => $ending[1],
          ]);
        }
        $tabindex = 3;
        return redirect()->route('employees.show', compact('employee','tabindex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('status', 'تم حذف الموظف بنجاح');
    }
}
