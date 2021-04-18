<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Sistem',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'User Sistem',
            'username' => 'user',
            'password' => bcrypt('user123'),
            'role' => 'user'
        ]);
    }
}
