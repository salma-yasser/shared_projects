<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultPatient;
use App\Models\AdultPackage;
use App\Models\DepartmentPackage;
use App\Models\Invoice;
use Carbon\Carbon;

class AdultPatientIncome extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_patient_id', 'adult_package_id', 'department_package_id', 'invoice_id', 'paid', 'paid_type', 'is_received', 'receiving_date'
    ];

     public function getReceivingDateAttribute($value)
     {
         return Carbon::parse($value)->format('m/d/Y');
     }

     public function setReceivingDateAttribute($value)
     {
         $this->attributes['receiving_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
     }

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }

    public function adult_package()
    {
        return $this->belongsTo(AdultPackage::class);
    }

    public function department_package()
    {
        return $this->belongsTo(DepartmentPackage::class)->withTrashed();
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
