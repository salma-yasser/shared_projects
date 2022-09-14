<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\FollowupType;
use Carbon\Carbon;

class EmployeeFollowup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'followup_type_id', 'name','date','file_path'
    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_followup';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function followup_type()
    {
        return $this->belongsTo(FollowupType::class);
    }

    public function getDateAttribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('d/m/Y');
        }
        return null;
    }

    public function setDateAttribute($value)
    {
        if($value != null){
          $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }
}
