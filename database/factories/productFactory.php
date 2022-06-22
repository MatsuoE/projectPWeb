<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3,5)),
            'slug' => $this->faker->slug(),
            'stock' => $this->faker->numberBetween(1, 20),
            'price' => $this->faker->numberBetween(10000, 20000),
            'excerpt' => $this->faker->sentence(mt_rand(14, 15)),
            'body' => $this->faker->paragraph(mt_rand(5,10)),
            'category_id' => mt_rand(1,3)
        ];
    }
}
