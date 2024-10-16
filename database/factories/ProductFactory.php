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
            'name' => $this->faker->name(),
            'detail' => $this->faker->realText(250),
            'image' => $this->faker->imageUrl(),
            'filename' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween(1000, 5000),
            'sku' => $this->faker->words(1, true),
        ];
    }
}
