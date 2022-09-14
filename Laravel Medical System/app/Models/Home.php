<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $fillable = [
        'note_title', 'employee_id', 'note_description'
    ];

    public function employee()
    {

        
        return $this->belongsTo(Employee::class);
    }
}
