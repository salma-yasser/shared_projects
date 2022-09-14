<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultPatient;
use App\Models\AdultRevaluationFile;

class AdultRevaluation extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_patient_id', 'file_path'
    ];

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }

    public function adult_revaluation_files()
    {
        return $this->hasMany(AdultRevaluationFile::class);
    }
}
