<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('add_plots')->insert([
            'plotno' => '1',
                'type' => 'Residential',
                'categories' => 'Corner Plot',
                'length' => '50',
                'width' => '30',
                'marla' => '10',
                'price' => '500000',
                'down_payment' => '100000',
                'total_amount' => '400000',
                'description' => 'A beautiful corner plot with ample space for construction.',
                'status' => 1,
                'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('add_plots')->insert([
            'plotno' => '2',
                'type' => 'Residential',
                'categories' => 'Front',
                'length' => '33',
                'width' => '33',
                'marla' => '4',
                'price' => '100000',
                'down_payment' => '150000',
                'total_amount' => '400000',
                'description' => 'A beautiful Front plot with ample space for construction.',
                'status' => 1,
                'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
