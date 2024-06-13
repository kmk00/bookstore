<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->sentence(),
            'authors' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'publisher' => $this->faker->name(),
            'created' => $this->faker->date(),
            'genres' => 'horror,sci-fi,adventure',
            'language' => 'ENG',
            'pages' => $this->faker->numberBetween(100, 500),
            'price' => $this->faker->numberBetween(100, 500),
            
            //
        ];
    }
}
