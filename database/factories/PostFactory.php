<?php

namespace Database\Factories;

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
        return [
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(20),
            'imagen' => $this->faker->uuid() . "." . $this->faker->randomElement(['jpg', 'png', 'jpeg', 'gif']),
            'user_id' => $this->faker->randomElement([1, 3, 4, 5, 6]),
        ];
    }
}
