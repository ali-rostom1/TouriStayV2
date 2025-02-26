<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Landlord>
 */
class LandlordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role','landlord')->get()->random();
        return [
            'id' => $user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'password'=>$user->password,
            'role'=>'landlord',
            'profile_picture'=>$user->profile_picture,
            'business_license' => Str::random(8),
            'property_count' => fake()->randomNumber(2),
        ];
    }
}
