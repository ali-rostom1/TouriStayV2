<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\Tourist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "tourist_id" => 16,
            "listing_id" => 7,
            "startdate" => "1977-08-29",
            "enddate" => "1977-08-31",
            "price" => 83.02,
        ];
    }
}
