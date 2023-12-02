<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table='cart_details';
    protected $guarded = [];


    public function cart() 
    {
        return $this->belongsTo(Cart::class);
    }

    public function product() 
    {
        return $this->belongsTo(Product::class);
    }

    function getProductPrice()
    {
        return $this->product->calculatePrice();    
    }
    function calculatePrice()
    {
        return $this->quantity * $this->product->calculatePrice();    
    }


}
