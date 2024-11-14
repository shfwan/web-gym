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
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }

    }
}
