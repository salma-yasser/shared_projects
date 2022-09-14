<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\Salary;
use App\Models\BloodType;
use App\Models\adultNotes;
use App\Models\ChildNotes;
use App\Models\Department;
use App\Models\Nationality;
use App\Models\StickyNotes;
use App\Models\AdultPackage;
use App\Models\ChildPackage;
use App\Models\ContractType;
use App\Models\EmployeeFile;
use App\Models\EmpSessionTime;
use App\Models\EmpWorkingTime;
use Laravel\Jetstream\HasTeams;
use App\Models\AdultAppointment;
use App\Models\ChildAppointment;
use App\Models\EmployeeFollowup;
use App\Models\EmployeeAttendance;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;

    /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'employees';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','emp_no','authority_id','manager_id','fullname','mobile','nationality_id','birthdate','kind','marital_status','blood_type_id','address','exist','department_id','job_id','qualification','experience', 'entry_date', 'border_no', 'medical_insurance', 'sa_id', 'sa_file_name','sa_file_path','contract_type_id','contract_expire_date', 'contract_file_name','contract_file_path','salary','bank_name', 'iban','bank_file_path','license_number','license_issue_date','license_end_date','license_file_name','license_file_path','dataflow_no','dataflow_file_path','dataflow_file_name',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // public function getBirthdateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('m/d/Y');
    // }
    //
    // public function setBirthdateAttribute($value)
    // {
    //     $this->attributes['birthdate'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }
    //
    // public function getEntryDateAttribute($value)
    // {
    //     if($value != null){
    //       return Carbon::parse($value)->format('m/d/Y');
    //     }
    //     return null;
    // }
    //
    // public function setEntryDateAttribute($value)
    // {
    //     if($value != null){
    //       $this->attributes['entry_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    //     }
    // }
    //
    // public function getContractExpireDateAttribute($value)
    // {
    //     if($value != null){
    //       return Carbon::parse($value)->format('m/d/Y');
    //     }
    //     return null;
    // }
    //
    // public function setContractExpireDateAttribute($value)
    // {
    //     if($value != null){
    //       $this->attributes['contract_expire_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    //     }
    // }
    //
    // public function getLicenseIssueDateAttribute($value)
    // {
    //     if($value != null){
    //       return Carbon::parse($value)->format('m/d/Y');
    //     }
    //     return null;
    // }
    //
    // public function setLicenseIssueDateAttribute($value)
    // {
    //     if($value != null){
    //       $this->attributes['license_issue_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    //     }
    // }
    //
    // public function getLicenseEndDateAttribute($value)
    // {
    //     if($value != null){
    //       return Carbon::parse($value)->format('m/d/Y');
    //     }
    //     return null;
    // }
    //
    // public function setLicenseEndDateAttribute($value)
    // {
    //     if($value != null){
    //       $this->attributes['license_end_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    //     }
    // }

    public function getAge()
    {
        return Carbon::parse($this->attributes['birthdate'])->diff(Carbon::now())->format('%y');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function contract_type()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function employee_files()
    {
        return $this->hasMany(EmployeeFile::class);
    }

    public function employee_followups()
    {
        return $this->hasMany(EmployeeFollowup::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function adult_packages()
    {
        return $this->hasMany(AdultPackage::class);
    }

    public function child_packages()
    {
        return $this->hasMany(ChildPackage::class);
    }

    public function adult_active_packages()
    {
        return $this->hasMany(AdultPackage::class)->where('status', config('enums.patient_package_status_values.active'));
    }

    public function child_active_packages()
    {
        return $this->hasMany(ChildPackage::class)->where('status', config('enums.patient_package_status_values.active'));
    }

    public function adult_appointments()
    {
        $from = Carbon::now()->startOfDay();
        $to = Carbon::now()->addDays(1)->startOfDay();
        return $this->hasMany(AdultAppointment::class)->whereBetween('time', [$from, $to])->orderBy('time');
    }

    public function child_appointments()
    {
        $from = Carbon::now()->startOfDay();
        $to = Carbon::now()->addDays(1)->startOfDay();
        return $this->hasMany(ChildAppointment::class)->whereBetween('time', [$from, $to]);
    }

    public function emp_working_times()
    {
        $array = $this->hasMany(EmpWorkingTime::class)->orderBy('id', 'DESC')->take(2)->get();
        if(count($array)==2){
          if($array[0]->type == 1){
            unset($array[1]);
          }else{
            $temp = array();
            $temp[] = $array[1];
            $temp[] = $array[0];
            $array = $temp;
          }
        }
        return $array;
    }

    public function emp_session_times()
    {
        $array = $this->hasMany(EmpSessionTime::class)->with('emp_session_time_days')->orderBy('id', 'DESC')->take(2)->get();
        if(count($array)==2){
          if($array[0]->type == 1 || $array[0]->type == 3){
            unset($array[1]);
          }else{
            $temp = array();
            $temp[] = $array[1];
            $temp[] = $array[0];
            $array = $temp;
          }
        }
        return $array;
    }

    public function employee_attendances()
    {
        return $this->hasMany(EmployeeAttendance::class);
    }

    public function sticky_notes()
    {
        return $this->hasMany(StickyNotes::class);
    }

    public function adults_notes()
    {
        return $this->hasMany(adultNotes::class);
    }
    public function child_notes()
    {
        return $this->hasMany(ChildNotes::class);
    }
}
