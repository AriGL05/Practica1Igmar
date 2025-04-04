<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moons')->insert([
            [
                'name' => 'Luna',
                'planet' => 'Earth',
                'diameter_km' => 3474.8,
                'mass_kg' => 7.35e22,
                'discovery_year' => null,
                'discovery_by' => null,
            ],
            [
                'name' => 'Phobos',
                'planet' => 'Mars',
                'diameter_km' => 22.4,
                'mass_kg' => 1.06e16,
                'discovery_year' => '1877',
                'discovery_by' => 'Asaph Hall',
            ],
            [
                'name' => 'Deimos',
                'planet' => 'Mars',
                'diameter_km' => 12.4,
                'mass_kg' => 1.48e15,
                'discovery_year' => '1877',
                'discovery_by' => 'Asaph Hall',
            ],
            [
                'name' => 'Ganymede',
                'planet' => 'Jupiter',
                'diameter_km' => 5262.4,
                'mass_kg' => 1.48e23,
                'discovery_year' => "1610",
                'discovery_by' => 'Galileo Galilei',
            ],
            [
                'name' => 'Titan',
                'planet' => 'Saturn',
                'diameter_km' => 5150.0,
                'mass_kg' => 1.35e23,
                'discovery_year' => '1655',
                'discovery_by' => 'Christiaan Huygens',
            ],
        ]);
    }
}
