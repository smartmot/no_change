<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "no",
        "date",
        "currency",
        "note",
        "total",
    ];

    public function items(){
        return $this->hasMany(SaleItem::class, "sale_id");
    }
    public function payments(){
        return $this->hasMany(SalePayment::class, "sale_id");
    }

    protected $appends=[
        "paid",
        "dues",
        "pay_date",
    ];

    public function getPaidAttribute(){
        return $this->payments()->sum("paid");
    }
    public function getDuesAttribute(){
        return $this->total - $this->paid;
    }
    public function getPayDateAttribute(){
        return 1;//$this->payments()->latest("created_at")->first()->date;
    }
}
