<?php

namespace App\Models\Receipt;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = "stocks";

    protected $visible = [
        "qty",
        "product",
    ];

    public function product(){
        return $this->belongsTo(Product::class, "item_id");
    }
}
