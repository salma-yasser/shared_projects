<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildRevaluation;

class ChildRevaluationFile extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_revaluation_id', 'file_path'
    ];

    public function child_revaluation()
    {
        return $this->belongsTo(ChildRevaluation::class);
    }
}
