<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->realText($maxNbChars = 20),
            'image' => $this->faker->image('public/img',640,480, null, false),
            'price' => $this->faker->numberBetween(50, 100),
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
            //
        ];
    }
}
