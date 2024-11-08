<?php

namespace Database\Seeders;

use App\Models\Latihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyLatihansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $latihan = [
            [
                'title' => 'Latihan 1',
                'description' => 'Latihan 1 description',
                'picture' => ''
            ],
            [
                'title' => 'Latihan 2',
                'description' => 'Latihan 2 description',
                'picture' => ''
            ],
            [
                'title' => 'Latihan 3',
                'description' => 'Latihan 3 description',
                'picture' => ''
            ],
        ];

        foreach ($latihan as $key => $value) {
            Latihan::create($value);
        }
    }
}
