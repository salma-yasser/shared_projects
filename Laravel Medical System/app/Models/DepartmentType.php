<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class DepartmentType extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];
    
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}