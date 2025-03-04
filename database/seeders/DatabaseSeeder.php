<?php

namespace Database\Seeders;

use App\Models\Tourist;
use App\Models\User;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Listing;
use App\Models\Reservation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Reservation::factory(1)->create();
    }
}
