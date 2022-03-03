<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => Str::random(10),
            'title' => $this->faker->words(rand(2, 5), true),
            'description' => $this->faker->sentence,
            'body' => $this->faker->sentence(rand(2, 7), true),
            'publication' => '0',
            'user_id' => 1,
        ];
    }
}
