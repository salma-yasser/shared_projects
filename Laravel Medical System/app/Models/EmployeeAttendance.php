<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttendanceType;


class EmployeeAttendance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emp_attendance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'date', 'attendance_types_id','emp_working_time_id', 'attend_time', 'leave_time'
    ];

    public function attendanceType()
    {
        return $this->belongsTo(AttendanceType::class);
    }
}
