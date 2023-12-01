<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\DB;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->truncate();

        OrderStatus::create([
            'status'=>'accepted'
        ]);

        OrderStatus::create([
            'status'=>'preparing'
        ]);

        OrderStatus::create([
            'status'=>'on the way'
        ]);

        OrderStatus::create([
            'status'=>'done'
        ]);
    }
}
