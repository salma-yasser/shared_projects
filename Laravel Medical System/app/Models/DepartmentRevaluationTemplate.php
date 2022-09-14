<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;


class DepartmentRevaluationTemplate extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
