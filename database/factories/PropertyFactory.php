<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->title,
            "thumbnail" => "uploads/default.png",
            "summery" => fake()->text(),
            "description" => fake()->text(),
            "price" => fake()->numberBetween(1000, 100000),
            "bedrooms" => fake()->numberBetween(1, 20),
            "bathrooms" => fake()->numberBetween(1, 20),
            "balconies" => fake()->numberBetween(1, 20),
            "garages" => fake()->numberBetween(1, 5),
            "is_available" => [true, false][rand(0,1)],
            "sqft" => rand(1000,100000),


            "category_id" => Category::all()->random()->id,
            "company_id" => Company::all()->random()->id,
            "address_id" => Address::all()->random()->id,
        ];
    }
}
