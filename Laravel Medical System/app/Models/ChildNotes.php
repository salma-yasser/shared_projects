<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\ChildPatient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChildNotes extends Model
{
    use HasFactory;

    public function child_patient()
    {
        return $this->belongsTo(ChildPatient::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
