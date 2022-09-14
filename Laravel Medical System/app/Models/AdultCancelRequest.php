<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultPackage;
use App\Models\AdultPatient;

class AdultCancelRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    'adult_package_id', 'status', 'adult_patient_id'
    ];

    public function adult_package()
    {
        return $this->belongsTo(AdultPackage::class);
    }

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }
}
