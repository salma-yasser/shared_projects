<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ChildEvaluation;

class ChildEvaluationFile extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_evaluation_id', 'file_path'
    ];

    public function child_evaluation()
    {
        return $this->belongsTo(ChildEvaluation::class);
    }
}
