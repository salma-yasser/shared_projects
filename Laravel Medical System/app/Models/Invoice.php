<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CreditInvoice;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
       'to', 'paid_cash','paid_net', 'service_name', 'service_desc', 'paid', 'quantity', 'vat'
    ];

    public function credit_invoice()
    {
        return $this->belongsTo(CreditInvoice::class);
    }
}
