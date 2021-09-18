<?php

namespace App\Models\Receipt;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "sale_items";

    protected $visible = [
        "price",
        "stock_id",
        "stock",
    ];

    public function stock(){
        return $this->belongsTo(Stock::class,"stock_id")->with("product");
    }
}
