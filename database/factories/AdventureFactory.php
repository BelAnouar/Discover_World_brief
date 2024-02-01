<?php

namespace Database\Factories;

use App\Models\destination;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdventureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'consiel' => $this->faker->paragraph,
            'user_id' => null,
            'destination_id' => destination::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
