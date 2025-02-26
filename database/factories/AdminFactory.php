<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role','admin')->get()->random();
        return [
            'id' => $user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'role' => 'admin',
            'password'=>$user->password,
            'profile_picture'=>$user->profile_picture,
        ];
    }
}
