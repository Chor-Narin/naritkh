<?php
namespace Database\Factories;
use App\Models\Terrain;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'terrain_id' => Terrain::factory(),
            'user_id' => User::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
