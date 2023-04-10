<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(30),
            'slug' => $this->faker->slug,
            'tags' => json_encode($this->faker->words(2)),
            'user_id' => $this->faker->numberBetween(1, 10),
            'content' => $this->faker->realText(150),
        ];
    }
}
