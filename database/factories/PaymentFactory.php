<?php

namespace Database\Factories;
use App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'payment_method' => 'credit_card',
            'amount_paid' => $this->faker->randomFloat(2, 100, 1000),
            'payment_date' => now(),
            'status' => 'paid',
            'transaction_id' => $this->faker->uuid,
        ];
    }
}
