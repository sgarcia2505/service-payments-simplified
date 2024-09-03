<?php

namespace Database\Factories;

use App\Models\CustomerModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WalletModel>
 */
class WalletModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$customer = fake()->randomElement([CustomerModel::factory()])->create();
        return [
            'balance' => fake()->randomNumber(5),
            'customer_id' => fake()->randomNumber(3)
        ];
    }
}
