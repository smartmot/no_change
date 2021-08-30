<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        "ids",
        "name",
        "tel",
        "address",
        "gender",
        "note",
        "status",
        "photo",
    ];

    protected $appends = [
        "due",
        "stock",
        "invoice",
        "total",
        "dollar",
        "riel",
        "bath",
        "payments",
        "sold",
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function getPaymentsAttribute(){
        return [
            "paid" => [
                "usd" => $this->invoices()->where("currency", "usd")->get()->sum("paid"),
                "bath" => $this->invoices()->where("currency", "bath")->get()->sum("paid"),
                "riel" => $this->invoices()->where("currency", "riel")->get()->sum("paid"),
            ],
            "due" => [
                "usd" => $this->invoices()->where("currency", "usd")->get()->sum("due"),
                "bath" => $this->invoices()->where("currency", "bath")->get()->sum("due"),
                "riel" => $this->invoices()->where("currency", "riel")->get()->sum("due"),
            ]
        ];
    }
    public function getDollarAttribute(){
        return $this->invoices()->where("currency", "=","usd")->get()->sum("total");
    }
    public function getRielAttribute(){
        return $this->invoices()->where("currency", "=","riel")->get()->sum("total");
    }
    public function getBathAttribute(){
        return $this->invoices()->where("currency", "=","bath")->get()->sum("total");
    }
    public function getTotalAttribute(){
        $total= $this->invoices()->get()->sum("dollar");
        return $total;
    }
    public function getInvoiceAttribute(){
        return $this->invoices()->count("id");
    }
    public function getStockAttribute(){
        $stocks = InvoiceItem::query()->get()->where("supplier_id", $this->id)->sum(function ($stock){
            return $stock["qty"];
        });
        return $stocks;
    }

    public function getQtysAttribute(){
        $stocks = InvoiceItem::query()->get()->where("supplier_id", $this->id)->sum(function ($stock){
            return $stock["qtys"];
        });
        return $stocks;
    }

    public function getSoldAttribute(){
        $stocks = InvoiceItem::query()->get()->where("supplier_id", $this->id)->sum(function ($stock){
            return $stock["sold"];
        });
        return $stocks;
    }

    public function getDueAttribute(){
        return $this->invoices()->get()->sum(function ($invs){
            return $invs["due"];
        });
    }
}
