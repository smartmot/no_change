<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        "supplier_id",
        "no",
        "photo",
        "name",
        "date",
        "time",
        "currency",
    ];
    public function items(){
        return $this->hasMany(InvoiceItem::class,"invoice_id");
    }

    public function payments(){
        return $this->hasMany(InvoicePayment::class, "invoice_id");
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }


    protected $appends = [
        "total",
        "paid",
        "due",
        "link",
        "clink",
        "dollar"
    ];

    public function getDollarAttribute(){
        $money = $this->total;
        switch ($this->currency){
            case "usd":
                $money = $this->total;
                break;
            case "riel":
                $money = $this->total;
                break;
            case "bath":
                $money = $this->total;
                break;
        }
        return $money;
    }
    public function getTotalAttribute(){
        $total = $this->items()->get()->sum(function ($payment){
            return $payment["amount"];
        });
        return $total;
    }

    public function getPaidAttribute(){
        $paid = $this->payments()->sum("paid");
        return $paid;
    }

    public function getDueAttribute(){
        return $this->total - $this->paid;
    }

    public function getClinkAttribute(){
        return route("invoices.check",[
            $this->supplier_id, $this->id
        ]);
    }
    public function getLinkAttribute(){
        return route("invoices.show", [$this->supplier_id, $this->id]);
    }

}
