<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Adventure;
use App\Models\destination;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // destination::factory(2)->create();
        User::factory(2)->create()->each(function ($user) {
            Adventure::factory(10)->for($user)->create()->each(function ($adventure) {
                // $destination = destination::factory(2)->create();
                // $adventure->destination()->associate($destination)->save();
                Image::factory(6)->for($adventure)->create();
            });
        });
        // \App\Models\

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
