<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $name = $this->faker->sentence();
        return [
            'title' => $name,
            'slug' => str($name)->slug(),
            'content' => fake()->paragraphs(20,true),
            'description' => $this->faker->paragraphs(3,true),
            'categoria_id' => fake()->randomElement(Categoria::all()),
            'posted' => fake()->randomElement(['yes','not']),
            'image' => fake()->imageUrl()
        ];
    }
}
