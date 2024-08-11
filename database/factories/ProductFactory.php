<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['clothes', 'toys', 'colours']),
            'price' => fake()->randomFloat(2),
            'description' => fake()->text(),
            'published' => fake()->numberBetween(0, 1),
            'image'=> basename(fake()->image(public_path('assets/images/products'))),
        ];
    }
}
