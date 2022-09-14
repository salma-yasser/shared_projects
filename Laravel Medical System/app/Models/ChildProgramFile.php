<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildProgram;

class ChildProgramFile extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_program_id', 'file_path'
    ];

    public function child_program()
    {
        return $this->belongsTo(ChildProgram::class);
    }
}
