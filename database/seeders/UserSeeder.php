<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Staff',
            'phone' => '07012771991',
            'address' => 'Chiba, Japan',
            'issue_number' => '001191017777',
            'password' => bcrypt('123456'),
            'role' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        DB::table('users')->insert([
            'name' => 'Pham Ngoc Lien',
            'phone' => '0981588791',
            'address' => 'Nam Tu Liem, Ha Noi',
            'issue_number' => '001191017878',
            'password' => bcrypt('123456'),
            'role' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        DB::table('users')->insert([
            'name' => 'Pham Minh Hung',
            'phone' => '0961361087',
            'address' => 'Cay Giay, Ha Noi',
            'issue_number' => '001187017878',
            'password' => bcrypt('123456'),
            'role' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
    }
}
