<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmpSessionTime;
use Carbon\Carbon;

class EmpSessionTimeDay extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_session_time_id', 'day_0', 'day_1', 'day_2', 'day_3', 'day_4', 'day_5'
    ];

    public function getDay0Attribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setDay0Attribute($value)
    {
        if($value != null){
          $this->attributes['day_0'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function getDay1Attribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setDay1Attribute($value)
    {
        if($value != null){
          $this->attributes['day_1'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function getDay2Attribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setDay2Attribute($value)
    {
        if($value != null){
          $this->attributes['day_2'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function getDay3Attribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setDay3Attribute($value)
    {
        if($value != null){
          $this->attributes['day_3'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function getDay4Attribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setDay4Attribute($value)
    {
        if($value != null){
          $this->attributes['day_4'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function getDay5Attribute($value)
    {
        if($value != null){
          return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function setDay5Attribute($value)
    {
        if($value != null){
          $this->attributes['day_5'] = is_null($value)?null:Carbon::createFromFormat('H:i', $value)->format('H:i');
        }
    }

    public function emp_session_time()
    {
        return $this->belongsTo(EmpSessionTime::class);
    }

}
