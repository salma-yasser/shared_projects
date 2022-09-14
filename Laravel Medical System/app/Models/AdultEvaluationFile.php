<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AdultEvaluation;

class AdultEvaluationFile extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_evaluation_id', 'file_path'
    ];

    public function adult_evaluation()
    {
        return $this->belongsTo(AdultEvaluation::class);
    }
}
