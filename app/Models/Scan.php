<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    use HasFactory;

    protected $fillable = [
        "staff_id",
        "time",
        "user_id",
    ];

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
