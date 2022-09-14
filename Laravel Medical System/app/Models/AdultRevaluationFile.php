<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultRevaluation;

class AdultRevaluationFile extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_revaluation_id', 'file_path'
    ];

    public function adult_revaluation()
    {
        return $this->belongsTo(AdultRevaluation::class);
    }
}
