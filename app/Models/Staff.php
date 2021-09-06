<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "photo",
        "gender",
        "tel",
        "department",
        "birthdate",
        "start_date",
        "address",
        "note",
        "code",
        "code_image",
        "status",
    ];

}
