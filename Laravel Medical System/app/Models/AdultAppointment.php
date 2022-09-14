<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultPackage;
use App\Models\AdultPatient;
use App\Models\Employee;
use App\Models\DepartmentPackage;
use Carbon\Carbon;

class AdultAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_patient_id', 'employee_id', 'department_package_id', 'adult_package_id', 'name', 'time', 'cost', 'discount', 'status', 'paid', 'rest', 'paid_type', 'medical_execuse_file', 'adult_appointment_id'
    ];

    // public function getTimeAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y h:i a');
    // }
    //
    // public function setTimeAttribute($value)
    // {
    //     $this->attributes['time'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y h:i a', $value)->format('Y-m-d HH:mm:ss');
    // }

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function department_package()
    {
        return $this->belongsTo(DepartmentPackage::class)->withTrashed();
    }

    public function adult_package()
    {
        return $this->belongsTo(AdultPackage::class);
    }

    public function adult_appointment()
    {
        return $this->belongsTo(AdultAppointment::class);
    }

}
