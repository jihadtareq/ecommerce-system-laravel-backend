<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MerchantSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(OrderStatusesSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(UserTypesSeeder::class);
        $this->call(CustomersSeeder::class);

    }
}
