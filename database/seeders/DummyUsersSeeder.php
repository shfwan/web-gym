<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@admin.com',
                'phone' => '1234567890',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],

            [
                'firstname' => 'User 1',
                'lastname' => 'User 1',
                'email' => 'User1@User.com',
                'phone' => '123456789',
                'role' => 'member',
                'password' => bcrypt('user'),
            ],

            [
                'firstname' => 'User 2',
                'lastname' => 'User 2',
                'email' => 'User2@User.com',
                'phone' => '08123456789',
                'role' => 'member',
                'password' => bcrypt('user'),
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }

    }
}
