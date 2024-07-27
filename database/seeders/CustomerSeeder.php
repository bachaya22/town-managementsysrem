<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'image' => 'path/to/image1.jpg',
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'cnic' => '3130370788957',
            'phone' => '0301861978',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('customers')->insert([
            'image' => 'path/to/image2.jpg',
            'name' => 'Usman',
            'email' => 'usman@gmail.com',
            'cnic' => '3130384552017',
            'phone' => '03033284177',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
