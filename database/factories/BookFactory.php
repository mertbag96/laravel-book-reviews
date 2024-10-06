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
        $date = fake()->dateTimeBetween('-2 years', '-1 year');

        return [
            'title' => fake()->sentence(random_int(1, 5)),
            'author' => fake()->firstName() . ' ' . fake()->lastName(),
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
