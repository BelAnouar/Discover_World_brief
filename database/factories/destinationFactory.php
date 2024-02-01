<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\destination>
 */
class destinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'continent' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'image' => "/images/adv.jpg",
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
