<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_id",
        "qty",
        "type",
        "note",
        "date",
    ];

    public function item(){
        return $this->belongsTo(InvoiceItem::class,"item_id");
    }

    protected $appends = [
        "amount",
    ];
    public function getAmountAttribute(){
        return $this->item()->first()->unit_price * $this->qty;
    }
}
