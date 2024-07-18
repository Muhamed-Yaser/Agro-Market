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
        $name = $this->faker->name;
        return [
            'name' => $name,
            'description' => $this->faker->sentence(15),
            'product_image' => $this->faker->imageUrl(300 , 400),
            'price' => rand(1 , 499),
            'compare_price' => rand(500 , 700),
        ];
    }
}
