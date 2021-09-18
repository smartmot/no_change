<?php

namespace App\Models\Receipt;
use App\Models\SalePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $table = "sales";

    protected $hidden = [
        "created_at",
        "updated_at",
        "customer_id",
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, "customer_id");
    }

    public function items(){
        return $this->hasMany(Item::class, "sale_id")->with("stock");
    }

    public function payments(){
        return $this->hasMany(SalePayment::class, "sale_id");
    }

    protected $appends=[
        "paid",
        "due",
    ];

    public function getPaidAttribute(){
        return $this->payments()->sum("paid");
    }
    public function getDueAttribute(){
        return $this->total - $this->paid;
    }
}
