<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildAppointment;
use App\Models\ChildPatient;
use App\Models\Employee;
use App\Models\DepartmentPackage;
use App\Models\ChildPatientIncome;
use Carbon\Carbon;

class ChildPackage extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_patient_id', 'employee_id', 'department_package_id', 'cost', 'discount', 'supscription_date', 'expire_date', 'paid', 'rest', 'rest_session_number', 'status', 'pending_time', 'pending_reason', 'pending_file', 'refund', 'is_refunded'
    ];

    public function getSupscriptionDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setSupscriptionDateAttribute($value)
    {
        $this->attributes['supscription_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getExpireDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setExpireDateAttribute($value)
    {
        $this->attributes['expire_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getPendingTimeAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setPendingTimeAttribute($value)
    {
        $this->attributes['pending_time'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function child_patient()
    {
        return $this->belongsTo(ChildPatient::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function department_package()
    {
        return $this->belongsTo(DepartmentPackage::class)->withTrashed();
    }

    public function child_appointments()
    {
        return $this->hasMany(ChildAppointment::class)->orderBy('time');
    }

    public function child_patient_incomes()
    {
        return $this->hasMany(ChildPatientIncome::class);
    }
}
