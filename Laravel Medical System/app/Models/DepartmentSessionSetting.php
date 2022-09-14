<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class DepartmentSessionSetting extends Model
{
    use HasFactory;

    protected $fillable = [
      'department_id', 'session_duration', 'session_patient_number'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
