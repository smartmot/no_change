<?php

namespace App\Models\Receipt;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $visible = [
        "name",
        "tel"
    ];

}
