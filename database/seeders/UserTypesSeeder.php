<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;
use Illuminate\Support\Facades\DB;
class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_types')->truncate();

        UserType::create([
            'type'=>'merchant'
        ]);

        UserType::create([
            'type'=>'user'
        ]);
    }
}
