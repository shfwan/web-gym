<?php

namespace Database\Seeders;

use App\Models\Pelatih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyPelatihsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelatihData = [
            [
                'gym_id' => 1,
                'name' => 'Pelatih 1',
                'picture' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80',
                'description' => 'Pelatih 1 description',
                'price' => 100000,
            ],
            [
                'gym_id' => 1,
                'name' => 'Pelatih 2',
                'picture' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80',
                'description' => 'Pelatih 2 description',
                'price' => 100000,
            ],
            [
                'gym_id' => 1,
                'name' => 'Pelatih 3',
                'picture' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80',
                'description' => 'Pelatih 3 description',
                'price' => 100000,
            ],
            [
                'gym_id' => 1,
                'name' => 'Pelatih 4',
                'picture' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80',
                'description' => 'Pelatih 4 description',
                'price' => 100000,
            ],
        ];

        foreach ($pelatihData as $key => $value) {
            Pelatih::create($value);
        }
    }
}
