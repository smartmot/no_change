<?php

namespace App\Models\Receipt;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "invoice_items";
    protected $visible = [
        "name"
    ];
}
