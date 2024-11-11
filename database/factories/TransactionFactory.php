<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'type' => $this->faker->randomElement(\App\Enums\TransactionType::getValues()),
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'status' => $this->faker->randomElement(\App\Enums\TransactionStatus::getValues()),
            'reference' => $this->faker->uuid,
            'load_service' => $this->faker->word,
            'phone_number' => '639'.mt_rand(1000000000, 9999999999),
        ];
    }
}
