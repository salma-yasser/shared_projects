<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildDepartment;
use App\Models\ChildProgramFile;

class ChildProgram extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_department_id', 'file_path'
    ];

    public function child_department()
    {
        return $this->belongsTo(ChildDepartment::class);
    }

    public function child_program_files()
    {
        return $this->hasMany(ChildProgramFile::class);
    }
}
