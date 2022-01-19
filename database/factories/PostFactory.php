<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name,
            'desc' => $this->faker->text(150),
            'categories_id' => Categories::factory(1)->create()->first(),
        ];
    }
}
