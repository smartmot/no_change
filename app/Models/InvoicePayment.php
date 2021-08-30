<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        "invoice_id",
        "paid",
        "pay_date",
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    protected $appends = [
        "date",
        "var",
    ];
    public function getDateAttribute(){
        return date_format(date_create($this->pay_date), "d/m/Y");
    }

    public function getVarAttribute(){
        return 0;
    }
}
