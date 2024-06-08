<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\Auth\StoreController;
use App\Models\Film;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Genre::factory(10)->create();
        $films = Film::factory(30)->create();

        $genres = Genre::all();

        foreach ($films as $film) {
            $genreIds = $genres->random(rand(3, 5))->pluck('id');
            $film->genres()->attach($genreIds);
        }


        //admin user
        if (!User::first()){
            User::create([
                'name' => 'admin',
                'password' => 'admin',
            ]);
        }
    }
}
