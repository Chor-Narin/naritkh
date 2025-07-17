<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TerrainImage>
 */
use App\Models\Terrain;

class Terrain_imagesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'terrain_id' => Terrain::factory(),
            'image_path' => $this->faker->imageUrl(),
            'uploaded_at' => now(),
        ];
    }
}
