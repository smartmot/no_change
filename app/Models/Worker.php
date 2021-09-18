<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Worker extends Model
{
    use HasFactory;
    protected $table = "staff";
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
        "user_id",
    ];

    public function scans(){
        return $this->hasMany(Scan::class, "staff_id");
    }

    protected $appends = [
        "work",
        "pre_salary",
        "is_paid",
    ];
    public function salary(){
        return $this
            ->hasOne(StaffSalary::class, "staff_id")
            ->where("status", "=", "primary");
    }

    public function getPreSalaryAttribute(){
        $salary = $this->salary()->first();
        return $salary === null ? null : $salary->salary;
    }

    public function getIsPaidAttribute(){
        $month = request()->has("month") ? request("month") : date("Y-m");
        $payment = SalaryPayment::query()
            ->where("staff_id", "=", $this->id)
            ->where("for", "=", $month)
            ->first();
        if ($payment === null){
            return false;
        }else{
            return $payment->toArray();
        }
    }
    public function getWorkAttribute(){
        $month = request()->has("month") ? request("month") : date("Y-m");
        $mon = date_format(date_create($month), "m");
        $year = date_format(date_create($month), "Y");
        $data = DB::table("scans")
            ->selectRaw("DATE(time) as date, MONTH(time) as month, YEAR(time) as year, (HOUR(time)*60 + MINUTE(time)) as min")
            ->where("staff_id", "=", $this->id)
            ->having("month", "=", $mon)
            ->having("year", "=", $year)
            ->get()
            ->groupBy("date")
            ->toArray();
        $mun_day = 0;
        foreach ($data as $day){
            $hour = 0;
            if (count($day) === 2){
                $hour = ($day[1]->min - $day[0]->min)/60;
                if($hour >= 8){
                    $mun_day+=1;
                }elseif ($hour >= 4){
                    $mun_day += 0.5;
                }
            }elseif (count($day) === 1){
                $hour = (1020 - $day[0]->min)/60;
                if($hour >= 8){
                    $mun_day+=1;
                }elseif ($hour >= 4){
                    $mun_day += 0.5;
                }
            }
        }
        return $mun_day;
    }
}
