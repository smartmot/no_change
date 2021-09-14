<?php

namespace App\Models\Report;

use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyExpense extends Model
{
    use HasFactory;

    protected $table = "invoices";

    protected $appends = [
        "qty",
        "total",
        "paid",
        "due",
    ];

    public function getQtyAttribute(){
        $itms = DB::table("invoice_items")
            ->join("invoices", "invoices.id", "=", "invoice_items.invoice_id")
            ->where("invoices.date", "=", $this->date)
            ->join("stocks", "stocks.item_id", "=", "invoice_items.id")
            ->where("stocks.type", "=", "stock_in")
            ->sum("qty");
        return (float)$itms;
    }

    public function getTotalAttribute(){
        $itms = DB::table("invoice_items")
            ->selectRaw("SUM((qty*unit_price)) as amount, currency")
            ->join("invoices", "invoices.id", "=", "invoice_items.invoice_id")
            ->where("invoices.date", "=", $this->date)
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

    public function getPaidAttribute(){
        $payments = DB::table("invoice_payments")
            ->selectRaw("currency, SUM(paid) as paid")
            ->join("invoices", "invoices.id", "=", "invoice_payments.invoice_id")
            ->where("invoices.date", "=", $this->date)
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
        return (float)$paid;
    }

    public function getDueAttribute(){
        return $this->total - $this->paid;
    }
}
