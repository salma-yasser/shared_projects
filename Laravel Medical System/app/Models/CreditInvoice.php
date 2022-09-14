<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class CreditInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
       'invoice_id', 'credit_cost', 'reason'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
