<?php

namespace Database\Seeders;

use App\Models\MerchantDetail;
use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::transaction(function() {
            
            $merchant = User::create([
                'name'=>'Youssed',
                'phone'=>'01208378'.rand(100,999),
                'email'=>'Youssef@gmail.com',  
                'type_id'=>1,     
                'password'=>123456
      
            ]);
    
            MerchantDetail::create([
                'user_id'=>$merchant->id,
                'commercial_registration_number'=>rand(),
                'tax_registration_number'=>'tax-'.rand(),
            ]);

            $store = Store::create([
                "merchant_id"=>$merchant->id,
                "include_vat"=>0,
                "vat_percentage"=>0,
                "shipping_cost"=>25.7
            ]);

            for ($i=0; $i < 3; $i++) { 
                $product = Product::create([
                    "store_id"=> $store->id,
                    "available_quantity"=> rand(1,30),
                    "price"=> rand(10,100),
                    "image"=> "test,jpg",
                ]);
    
                $data['name']['en'] =  "product $product->id";
                $data['name']['ar'] =  "$product->id منتج";
                $data['description']['en'] =  "product product product - $product->id";
                $data['description']['ar'] =  "$product->id - منتج منتج منتج`";

                $product->setNameTranslations($data['name']);
                $product->setDescriptionTranslations($data['description']);
            }
        });

    }
}
