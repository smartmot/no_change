<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "photo",
        "gender",
        "tel",
        "department",
        "birthdate",
        "start_date",
        "address",
        "note",
        "code_image",
        "status",
    ];

    public function salary(){
        return $this
            ->hasOne(StaffSalary::class, "staff_id")
            ->where("status", "=", "primary");
    }

    protected $appends = [
        "pre_salary",
    ];

    public function getPreSalaryAttribute(){
        $salary = $this->salary()->first();
        return $salary === null ? null : $salary->salary;
    }
}
