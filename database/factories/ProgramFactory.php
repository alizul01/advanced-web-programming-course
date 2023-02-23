<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(16),
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(640, 480, 'program', true),
            'tags' => json_encode($this->faker->words(3)),
            'content' => $this->faker->realText(1000),
        ];
    }
}
