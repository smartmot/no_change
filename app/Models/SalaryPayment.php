<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "staff_id",
        "salary_id",
        "for",
        "date",
        "salary",
    ];

    protected $appends = [

    ];

    public function staff(){
        return $this->belongsTo(Staff::class, "staff_id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function was_salary(){
        return $this->belongsTo(StaffSalary::class, "salary_id");
    }
}
