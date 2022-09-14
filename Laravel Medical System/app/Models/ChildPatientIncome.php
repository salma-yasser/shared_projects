<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildPatient;
use App\Models\ChildPackage;
use App\Models\DepartmentPackage;
use App\Models\Invoice;
use Carbon\Carbon;

class ChildPatientIncome extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_patient_id', 'child_package_id', 'department_package_id', 'invoice_id', 'paid', 'paid_type', 'is_received', 'receiving_date'
    ];

    public function getReceivingDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function setReceivingDateAttribute($value)
    {
        $this->attributes['receiving_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function child_patient()
    {
        return $this->belongsTo(ChildPatient::class);
    }

    public function child_package()
    {
        return $this->belongsTo(ChildPackage::class);
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
