<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;

class Discount extends Model
{
    use HasFactory;

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
