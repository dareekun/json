<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option')->insert([
            'name' => 'time',
            'time'=> date('H:i:s')
        ]);
        DB::table('option')->insert([
            'name' => 'start',
            'time'=> date('H:i:s')
        ]);
        DB::table('option')->insert([
            'name' => 'stop',
            'time'=> date('H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Sistem',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}
