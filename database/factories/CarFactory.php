<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'car_title' => fake()->randomElement(['bmw', 'toyota', 'begaty']),
            'price' => fake()->randomFloat(2),
            'description' => fake()->text(),
            'published' => fake()->numberBetween(0, 1),
            'image'=> basename(fake()->image(public_path('assets/images/cars'))),
            'category_id' => fake()->numberBetween(1, 2, 3, 4),
            
        ];
    }
}
