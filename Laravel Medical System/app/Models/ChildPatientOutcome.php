<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildPatient;
use App\Models\ChildPackage;
use App\Models\CreditInvoice;

class ChildPatientOutcome extends Model
{
    use HasFactory;

    protected $fillable = [
      'child_patient_id', 'child_package_id', 'paid', 'description', 'credit_invoice_id'
    ];

    public function child_patient()
    {
        return $this->belongsTo(ChildPatient::class);
    }

    public function child_package()
    {
        return $this->belongsTo(ChildPackage::class);
    }

    public function credit_invoice()
    {
        return $this->belongsTo(CreditInvoice::class);
    }

}
