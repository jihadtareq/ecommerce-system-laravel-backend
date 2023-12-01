<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePaymentTransaction extends Model
{
    use HasFactory;

    protected $table='online_payment_transaltions';
    protected $guarded = [];

    public function order() 
    {
        return $this->belongsTo(Order::class);
    }
}
