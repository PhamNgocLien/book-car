<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('cars')->insert([
                'car_name' => '17H-1357' . $i,
                'area_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
        for ($i = 1; $i <= 3; $i++) {
            DB::table('cars')->insert([
                'car_name' => '17H-1359' . $i,
                'area_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
