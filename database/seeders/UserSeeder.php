<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('rahasia')
        ]);
        $admin->assignRole('admin');

        // $admin = User::create([
        //     'name' => 'Admin 2',
        //     'email' => 'admin2@gmail.com',
        //     'password' => bcrypt('rahasia')
        // ]);
        // $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'User 1',
            'email' => 'user@gmail.com',
            'password' => bcrypt('userbiasa')
        ]);
        $admin->assignRole('user');
    }
}
