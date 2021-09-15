<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MonthlyNetIncome extends Model
{
    use HasFactory;

    protected $table = "calendars";

    protected $appends = [
        "income",
        "expense",
        "salary",
        "net",
        "sup_due",
        "cus_due",
    ];
    public function getIncomeAttribute(){
        $payments = DB::table("sale_payments")
            ->selectRaw("SUM(paid) paid, currency, SUM(total) total")
            ->join("sales", "sales.id", "=", "sale_payments.sale_id")
            ->where("sales.date", "LIKE", $this->month."%")
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

    public function getSalaryAttribute(){
        $salary = DB::table("salary_payments")
            ->where("date", "LIKE", $this->month."%")
            ->sum("salary");
        return $salary;
    }

    public function getNetAttribute(){
        return ($this->income["total"] - $this->expense - $this->salary);
    }

    public function getCusDueAttribute(){
        return 0;
    }

    public function getSupDueAttribute(){
        $payments = DB::table("invoice_payments")
            ->selectRaw("currency, SUM(paid) as paid")
            ->join("invoices", "invoices.id", "=", "invoice_payments.invoice_id")
            ->where("invoices.date", "LIKE", $this->month."%")
            ->groupBy("currency")
            ->get()->toArray();
        $paid = 0;
        foreach ($payments as $pay){
            switch ($pay->currency){
                case "usd":
                    $paid += $pay->paid;
                    break;
                case "bath":
                    $paid += ((float)$pay->paid/config("pos.exchange")["bath_usd"]);
                    break;
                case "riel":
                    $paid += ((float)$pay->paid/config("pos.exchange")["riel_usd"]);
                    break;
            }
        }
        return $this->expense - (float)$paid;
    }

    public function getExpenseAttribute(){
        $itms = DB::table("invoice_items")
            ->selectRaw("SUM((qty*unit_price)) as amount, currency")
            ->join("invoices", "invoices.id", "=", "invoice_items.invoice_id")
            ->where("invoices.date", "LIKE", $this->month."%")
            ->join("stocks", "stocks.item_id", "=", "invoice_items.id")
            ->where("stocks.type", "=", "stock_in")
            ->groupBy("currency")->get()->toArray();
        $total = 0;
        foreach ($itms as $itm){
            switch ($itm->currency){
                case "usd":
                    $total += $itm->amount;
                    break;
                case "bath":
                    $total += ((float)$itm->amount/config("pos.exchange")["bath_usd"]);
                    break;
                case "riel":
                    $total += ((float)$itm->amount/config("pos.exchange")["riel_usd"]);
                    break;
            }
        }
        return (float)$total;
    }

}
