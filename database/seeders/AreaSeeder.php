<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'area_name' => 'TB',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        DB::table('areas')->insert([
            'area_name' => 'HN',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
    }
}
