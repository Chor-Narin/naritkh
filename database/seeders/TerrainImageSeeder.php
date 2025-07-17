<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Terrain_images;

class TerrainImageSeeder extends Seeder
{
    public function run(): void
    {
        Terrain_images::factory(20)->create();
    }
}

