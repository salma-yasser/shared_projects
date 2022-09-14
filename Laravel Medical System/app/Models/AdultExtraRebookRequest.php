<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultAppointment;
use App\Models\AdultPatient;

class AdultExtraRebookRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    'adult_appointment_id', 'status', 'time', 'adult_patient_id'
    ];

    public function adult_appointment()
    {
        return $this->belongsTo(AdultAppointment::class);
    }

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }
}
