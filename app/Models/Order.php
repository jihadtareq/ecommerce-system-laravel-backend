<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $guarded = [];


    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function details() 
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function driver() 
    {
        return $this->belongsTo(Driver::class,'driver_id','id');
    }

    public function status() 
    {
        return $this->belongsTo(OrderStatus::class,'status_id','id');
    }

    public function paymentMethod() 
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id','id');
    }
}
