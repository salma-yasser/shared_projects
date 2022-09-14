<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildPackage;
use App\Models\ChildPatient;
use App\Models\Employee;
use App\Models\DepartmentPackage;
use Carbon\Carbon;

class ChildAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_patient_id', 'employee_id', 'department_package_id', 'child_package_id', 'name', 'time', 'cost', 'discount', 'status', 'paid', 'rest', 'paid_type', 'medical_execuse_file', 'child_appointment_id'
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

    public function child_package()
    {
        return $this->belongsTo(ChildPackage::class);
    }

    public function child_appointment()
    {
        return $this->belongsTo(ChildAppointment::class);
    }

}
