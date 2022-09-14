<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\AdultPatientIncome;
use App\Models\ChildPatientIncome;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    'department_id', 'name', 'session_number', 'cost', 'expire_duration', 'execuse_number'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function adult_patient_incomes()
    {
        return $this->hasMany(AdultPatientIncome::class);
    }

    public function child_patient_incomes()
    {
        return $this->hasMany(ChildPatientIncome::class);
    }

}
