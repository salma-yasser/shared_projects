<?php

namespace App\Models;

use App\Models\AdultPatient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class adultNotes extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }

}
