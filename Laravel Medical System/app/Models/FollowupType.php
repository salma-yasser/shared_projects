<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeFollowup;

class FollowupType extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];
    
    public function employee_followups()
    {
        return $this->hasMany(EmployeeFollowup::class);
    }
}
