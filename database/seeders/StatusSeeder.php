<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status_name' => 'Chờ xếp xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        DB::table('statuses')->insert([
            'status_name' => 'Chờ khởi hành',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        DB::table('statuses')->insert([
            'status_name' => 'Đang di chuyển',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        DB::table('statuses')->insert([
            'status_name' => 'Đã hoàn thành',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        DB::table('statuses')->insert([
            'status_name' => 'Đã hủy',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
    }
}
