<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->truncate();

        $data = [
            [
                'name'=>'Mark Antonio',
                'phone'=>'+983781083174',
                'email'=>'mark@gmail.com',
                'picture'=>'',
                'description'=>'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five ',
            ],
            [
                'name'=>'Amy Antonio',
                'phone'=>'+983781083174',
                'email'=>'amy@gmail.com',
                'picture'=>'',
                'description'=>'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five ',
            ],
        ];

        DB::table('customers')->insert($data);

        
    }
}
