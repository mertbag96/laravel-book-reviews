<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(33)->create()->each(function ($book) {
            $count = random_int(5, 30);

            Review::factory()->count($count)->good()->for($book)->create();
        });

        Book::factory(33)->create()->each(function ($book) {
            $count = random_int(5, 30);

            Review::factory()->count($count)->average()->for($book)->create();
        });

        Book::factory(34)->create()->each(function ($book) {
            $count = random_int(5, 30);

            Review::factory()->count($count)->bad()->for($book)->create();
        });
    }
}
