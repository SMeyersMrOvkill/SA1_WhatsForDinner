<?php

use Illuminate\Database\Seeder;

use App\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::create([
            // Always make it my account ID for seeded data.
            'aid' => 1,
            // Applebee's is yummy.
            'name' => 'Applebee\'s Neighborhood Bar & Grill',
            // Simple description. Doesn't have to be perfect, as each instance belongs to a user.
            'description' => 'American-style cuisine. Burgers, cheap appetizers, decent drinks, etc...'
        ]);
    }
}
