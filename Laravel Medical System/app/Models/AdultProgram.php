<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultPatient;
use App\Models\AdultProgramFile;

class AdultProgram extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_patient_id', 'file_path'
    ];

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }

    public function adult_program_files()
    {
        return $this->hasMany(AdultProgramFile::class);
    }
}
