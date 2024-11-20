<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'type' => str_random(5),
            'mobile' => '79999999999',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin96'),
            'image' => str_random(10),
            'status' => '1',
        ]);
    }
}
