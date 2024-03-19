<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'image' => $this->faker->imageUrl(),
            'situation' => $this->faker->word(),
            'product_name' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'explanation' => $this->faker->sentence(),
            'price' => $this->faker->randomNumber(4),
        ];
    }
}
