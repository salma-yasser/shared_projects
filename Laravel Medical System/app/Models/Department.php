<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DepartmentType;
use App\Models\DepartmentPackage;
use App\Models\Employee;
use App\Models\DepartmentSessionSetting;
use App\Models\DepartmentEvaluationTemplate;
use App\Models\DepartmentRevaluatinTemplate;
use App\Models\DepartmentProgramTemplate;

class Department extends Model
{
    use HasFactory;

    protected $appends = array('doctors');

    protected $fillable = [
      'name','department_type_id'
    ];

    public function department_type()
    {
        return $this->belongsTo(DepartmentType::class);
    }

    public function department_packages()
    {
        return $this->hasMany(DepartmentPackage::class)->orderBy('session_number');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class)->where('exist', 1);
    }

    public function getDoctorsAttribute()
    {
        $employees = $this->hasMany(Employee::class)->where('exist', 1)->get();
        $manager = Employee::where('exist', 1)
            ->where('department_id', 2)
            ->get();
        return $employees->merge($manager);
    }

    public function department_session_settings()
    {
        return $this->hasMany(DepartmentSessionSetting::class);
    }

    public function department_evaluation_templates()
    {
        return $this->hasMany(DepartmentEvaluationTemplate::class);
    }

    public function department_revaluation_templates()
    {
        return $this->hasMany(DepartmentRevaluationTemplate::class);
    }

    public function department_program_templates()
    {
        return $this->hasMany(DepartmentProgramTemplate::class);
    }
}
