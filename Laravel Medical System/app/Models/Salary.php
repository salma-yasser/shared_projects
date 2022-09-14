<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discount;
use App\Models\Employee;
use Carbon\Carbon;

class Salary extends Model
{
    use HasFactory;


    public function getMonthAttribute($value)
    {
        return Carbon::parse($value)->format('M-Y');
    }

    public function setMonthAttribute($value)
    {
        $this->attributes['month'] = Carbon::createFromFormat('M-Y', $value)->format('Y-m');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
