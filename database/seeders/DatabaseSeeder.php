<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $features = Feature::factory(20)->create();

        for ($i=0; $i < 100; $i++) { 
            $property = Property::factory()->forUser()->create();
            $property->features()->attach($features->random(rand(3, 6))->pluck('id')->toArray());
        }
    }
}
