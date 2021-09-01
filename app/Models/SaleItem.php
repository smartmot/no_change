<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "sale_id",
        "stock_id",
        "price",
    ];

    public function stock(){
        return $this->belongsTo(Stock::class, "stock_id");
    }

    protected $appends =[
        "amount",
    ];

    public function getAmountAttribute(){
        return -$this->stock()->first()->qty * $this->price;
    }
}
