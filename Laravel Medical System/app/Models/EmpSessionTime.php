<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\EmpSessionTimeDay;
use Carbon\Carbon;

class EmpSessionTime extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emp_session_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'type', 'start_date','attend_time','leave_time'
    ];

    public function getStartDateAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function setStartDateAttribute($value)
    {
        if($value != null){
          $this->attributes['start_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }

    public function getAttendTimeAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setAttendTimeAttribute($value)
    {
        if($value != null){
          $this->attributes['attend_time'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function getLeaveTimeAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setLeaveTimeAttribute($value)
    {
        if($value != null){
          $this->attributes['leave_time'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function emp_session_time_days()
    {
        return $this->hasMany(EmpSessionTimeDay::class);
    }
}
