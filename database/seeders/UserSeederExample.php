<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Support\Facades\DB;



class UserSeederExample extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function() {
            
            $user = User::create([
                'name'=>'muhammed',
                'phone'=>'01208378'.rand(100,999),
                'email'=>'muhammed@gmail.com',  
                'type_id'=>2,     
                'password'=>123456
      
            ]);

            $products = Product::limit(3)->get();

            foreach ($products as $product) {
                $cart = Cart::create([
                    'user_id'=>$user->id,
                ]);
                CartDetail::create([
                    "cart_id"=> $cart->id,
                    "product_id"=> $product->id,
                    "quantity"=> rand(1,6),
                ]);
            }
    
        });
    }
}
