<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Job;
use App\Models\Department;
use App\Models\Nationality;
use App\Models\BloodType;
use App\Models\ContractType;
use App\Models\EmployeeFile;
use App\Models\EmployeeFollowup;
use App\Models\EmpWorkingTime;
use App\Models\EmployeeAttendance;
use App\Models\Salary;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

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
        'name', 'email', 'password',
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public function getBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function getEntryDateAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('m/d/Y');
        }
        return null;
    }

    public function setEntryDateAttribute($value)
    {
        if($value != null){
          $this->attributes['entry_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        }
    }

    public function getContractExpireDateAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('m/d/Y');
        }
        return null;
    }

    public function setContractExpireDateAttribute($value)
    {
        if($value != null){
          $this->attributes['contract_expire_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        }
    }

    public function getLicenseIssueDateAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('m/d/Y');
        }
        return null;
    }

    public function setLicenseIssueDateAttribute($value)
    {
        if($value != null){
          $this->attributes['license_issue_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        }
    }

    public function getLicenseEndDateAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('m/d/Y');
        }
        return null;
    }

    public function setLicenseEndDateAttribute($value)
    {
        if($value != null){
          $this->attributes['license_end_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        }
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
        return $this->hasMany(EmployeeFile::class, 'employee_id');
    }

    public function employee_followups()
    {
        return $this->hasMany(EmployeeFollowup::class, 'employee_id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'employee_id');
    }

    public function emp_working_times()
    {
        $array = $this->hasMany(EmpWorkingTime::class, 'employee_id')->orderBy('id', 'DESC')->take(2)->get();
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

    public function employee_attendances()
    {
        return $this->hasMany(EmployeeAttendance::class, 'employee_id');
    }
  }
