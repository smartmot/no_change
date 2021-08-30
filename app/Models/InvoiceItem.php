<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "invoice_id",
        "photo",
        "name",
        "ids",
        "unit_price",
        "barcode_image",
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class, "invoice_id");
    }

    public function stocks(){
        return $this->hasMany(Stock::class,"item_id");
    }

    protected $appends = [
        "amount",
        "qty",
        "qtys",
        "supplier_id",
        "lost",
        "sold",
        "date",
    ];

    public function getDateAttribute(){
        return $this->invoice()->first()->date;
    }
    public function getLostAttribute(){
        return $this->stocks()->where("type", "lost")->sum("qty");
    }
    public function getSoldAttribute(){
        return $this->stocks()->where("type", "sold")->sum("qty");
    }
    public function getQtyAttribute(){
        return $this->stocks()->sum("qty");
    }
    public function getQtysAttribute(){
        return $this->stocks()->where("type", "stock_in")->sum("qty");
    }
    public function getAmountAttribute(){
        $amount = $this->stocks()->get()->sum(function ($allstock){
            return $allstock["amount"];
        });
        return $amount;
    }

    public function getSupplierIdAttribute(){
        return $this->invoice()->first()->supplier_id;
    }
}
