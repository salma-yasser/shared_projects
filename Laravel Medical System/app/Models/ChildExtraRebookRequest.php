<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildAppointment;
use App\Models\ChildPatient;

class ChildExtraRebookRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    'child_appointment_id', 'status', 'time', 'child_patient_id'
    ];

    public function child_appointment()
    {
        return $this->belongsTo(ChildAppointment::class);
    }

    public function child_patient()
    {
        return $this->belongsTo(ChildPatient::class);
    }
}
