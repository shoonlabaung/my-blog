<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           
            'title' => fake()->word(),
             'category_id' => rand(1,10),
            'image' =>fake()->imageUrl(),
            'author' =>fake()->word(),
            'description' => fake()->paragraph(),
           

        ];
    }
}
