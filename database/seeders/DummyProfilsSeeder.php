<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyProfilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profilData = [
            [
                'user_id' => "9f5f6b26-8ef7-4383-81a2-af09fca243ca",
                'picture' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80',
                'bio' => 'Profil 1 description',
            ],
        ];
        foreach ($profilData as $key => $value) {
            Profil::create($value);
        }
    }
}
