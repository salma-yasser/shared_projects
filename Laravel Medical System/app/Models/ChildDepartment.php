<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildPatient;
use App\Models\Department;

class ChildDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
    'child_patient_id', 'department_id', 'required_session_number'
    ];

    public function department()
    {
//        return $this->belongsTo(Department::class)->with(['department_packages' => function ($query) {
//            $query->withTrashed();
//        },'employees','department_session_settings']);
        return $this->belongsTo(Department::class)->with('department_packages','employees','department_session_settings');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function child_evaluations()
    {
        return $this->hasMany(ChildEvaluation::class);
    }
    public function child_revaluations()
    {
        return $this->hasMany(ChildRevaluation::class);
    }
    public function child_programs()
    {
        return $this->hasMany(ChildProgram::class);
    }
}
