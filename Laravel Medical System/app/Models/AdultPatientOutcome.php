<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultPatient;
use App\Models\AdultPackage;
use App\Models\CreditInvoice;

class AdultPatientOutcome extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_patient_id', 'adult_package_id', 'paid', 'description', 'credit_invoice_id'
    ];

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }

    public function adult_package()
    {
        return $this->belongsTo(AdultPackage::class);
    }

    public function credit_invoice()
    {
        return $this->belongsTo(CreditInvoice::class);
    }

}
