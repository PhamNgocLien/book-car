<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('addresses')->insert([
                'address' => 'Thai Binh - Area ' . $i,
                'area_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            DB::table('addresses')->insert([
                'address' => 'Ha Noi - Area ' . $i,
                'area_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
