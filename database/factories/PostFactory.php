<?php

namespace Database\Factories;

use App\Models\Category;
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
        $created_At = $this->faker->dateTimeBetween('-3 months', '-1 days');


        return [
            'category_id' => rand(1, 10),
            'title' => $this->faker->unique()->word,
            'description' => '<p>' . implode('<p></p>', $this->faker->paragraphs(6)) . '</p>',
            'is_published' => $created_At,
        ];
    }
}
