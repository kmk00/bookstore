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
        $genre1 = $this->faker->randomElement(['horror', 'sci-fi', 'adventure','action','fantasy','comedy','romance']);
        $genre2 = $this->faker->randomElement(['horror', 'sci-fi', 'adventure','action','fantasy','comedy','romance']);
        $genre3 = $this->faker->randomElement(['horror', 'sci-fi', 'adventure','action','fantasy','comedy','romance']);
        $genreString = implode(',', [$genre1, $genre2, $genre3]);



        return [
            'title' => $this->faker->sentence(),
            'authors' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'publisher' => $this->faker->name(),
            'created' => $this->faker->date(),
            'genres' => $genreString,
            'language' => 'ENG',
            'quantityAvailable' => $this->faker->numberBetween(100, 500),
            'pages' => $this->faker->numberBetween(100, 500),
            'price' => $this->faker->numberBetween(100, 500),
            
            //
        ];
    }
}
