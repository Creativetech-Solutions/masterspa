<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(arrival_datesTableSeeder::class);
        $this->call(attendee_datesTableSeeder::class);
        $this->call(departure_datesTableSeeder::class);
        $this->call(attendee_extended_nightsTableSeeder::class);
    }
}
