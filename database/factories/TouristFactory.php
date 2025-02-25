<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tourist>
 */
class TouristFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random();
        return [
            'id' => $user->id,
            'name'=>$user->name,
            'email'=>$user->name,
            'password'=>$user->password,
            'profile_picture'=>$user->profile_picture,
            'passport_number' => fake()->randomNumber(6,true),
            'nationality' => Str::random(8),
        ];
    }
}
