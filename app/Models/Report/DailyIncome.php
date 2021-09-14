<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyIncome extends Model
{
    use HasFactory;

    protected $table = "sales";

    protected $appends = [
        "paid",
        "dues",
        "foot",
        "total",
    ];

    public function getPaidAttribute(){
        return $this->foot["paid"];
    }
    public function getTotalAttribute(){
        return $this->foot["total"];
    }
    public function getFootAttribute(){
        $payments = DB::table("sale_payments")
            ->selectRaw("SUM(paid) paid, currency, SUM(total) total")
            ->join("sales", "sales.id", "=", "sale_payments.sale_id")
            ->where("sales.date", "=", $this->date)
            ->groupBy("currency")
            ->get()
            ->toArray();
        $paid = 0;
        $total = 0;
        foreach ($payments as $pay){
            switch ($pay->currency){
                case "usd":
                    $paid += $pay->paid;
                    $total += $pay->total;
                    break;
                case "bath":
                    $paid += ((float)$pay->paid/config("pos.exchange")["bath_usd"]);
                    $total += ((float)$pay->total/config("pos.exchange")["bath_usd"]);
                    break;
                case "riel":
                    $paid += ((float)$pay->paid/config("pos.exchange")["riel_usd"]);
                    $total += ((float)$pay->total/config("pos.exchange")["riel_usd"]);
                    break;
            }
        }
        return [
            "paid" => (float)$paid,
            "total" => (float)$total
        ];
    }

    public function getDuesAttribute(){
        return $this->total - $this->paid;
    }
}
