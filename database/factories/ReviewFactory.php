<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ja_JP');
        return [
            'title' => $faker->realText(30), 
            'body' => $faker->realText(200), 
            'image' => $faker->imageUrl(640, 480, 'food'), 
            'rating' => $faker->numberBetween(1, 5), 
            'store_id' => $this->faker->numberBetween(18, 66), // 関連するStoreのID
        ];
    }
}
