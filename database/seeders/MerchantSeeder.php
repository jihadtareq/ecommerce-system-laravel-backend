<?php

namespace Database\Seeders;

use App\Models\MerchantDetail;
use App\Models\User;
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
        $merchant = User::create([
            'name'=>'Andrew',
            'phone'=>'01208378326',
            'email'=>'andrew@gmail.com',  
            'type_id'=>1,     
            'password'=>123456
  
        ]);

        MerchantDetail::create([
            'user_id'=>$merchant->id,
            'commercial_registration_number'=>'19254680808098733',
            'tax_registration_number'=>'tax-914810393',
        ]);
    }
}
