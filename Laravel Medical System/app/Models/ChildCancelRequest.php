<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildPackage;
use App\Models\ChildPatient;

class ChildCancelRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    'child_package_id', 'status', 'child_patient_id'
    ];

    public function child_package()
    {
        return $this->belongsTo(ChildPackage::class);
    }

    public function child_patient()
    {
        return $this->belongsTo(ChildPatient::class);
    }
}
