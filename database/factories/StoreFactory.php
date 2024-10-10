<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;
use App\Models\Region;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
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
            'region_id' => $this->faker->numberBetween(1, 28), // region_idは適当な範囲で
            'store_name' => $this->faker->company,
            'subject' => $this->faker->sentence,
            'introduction' => $this->faker->paragraph,
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'image' => $this->faker->imageUrl(640, 480, 'food'), 
        ];
    }
}
