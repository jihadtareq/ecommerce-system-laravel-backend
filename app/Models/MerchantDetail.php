<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantDetail extends Model
{
    use HasFactory;

    protected $table='merchant_details';
    protected $guarded = [];


    public function user() 
    {
        return $this->belongsTo(User::class);
    }

}
