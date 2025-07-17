<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Terrain;

class TerrainSeeder extends Seeder
{
    public function run(): void
    {
        Terrain::factory(10)->create();
    }
}