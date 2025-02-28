<?php

namespace Database\Factories;

use App\Models\Landlord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'landlord_id' => Landlord::all()->random()->id,
            'price' => fake()->randomFloat(2),
            'location' => fake()->address(),
            'startdate' => fake()->date(),
            'enddate' => fake()->date(),
            'city' => fake()->word(),
            'country' => fake()->word(),
            'equipments' => fake()->text(30),
            'description' => fake()->paragraph(),
            'persons' => fake()->numberBetween(0,5),
            'rooms' => fake()->numberBetween(0,5),
            'type' => "Appartement",
        ];
    }
}
