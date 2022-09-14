<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AdultProgram;

class AdultProgramFile extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_program_id', 'file_path'
    ];

    public function adult_program()
    {
        return $this->belongsTo(AdultProgram::class);
    }
}
