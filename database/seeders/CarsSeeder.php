<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'brand' => 'Volvo',
                'model' => 'XC90',
                'price' => 4000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Wolksvagen',
                'model' => 'Tiguan',
                'price' => 2500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Bmw',
                'model' => 'x5',
                'price' => '6000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
