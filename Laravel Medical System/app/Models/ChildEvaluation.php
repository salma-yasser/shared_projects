<?php

namespace App\Models;

use App\Models\ChildEvaluationFile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildDepartment;

class ChildEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_department_id', 'file_path'
    ];

    public function child_department()
    {
        return $this->belongsTo(ChildDepartment::class);
    }

    public function child_evaluation_files()
    {
        return $this->hasMany(ChildEvaluationFile::class);
    }
}
