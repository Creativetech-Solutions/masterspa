<?php

use Illuminate\Database\Seeder;

class departure_datesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departure_dates')->insert([

        	[
            'departure_date' => 'Depart Tuesday October 31, 2017 - Normal Departure Date - No Additional Charge',
            'rate' => '$0.00'  
        ],[
            'departure_date' => 'Depart Wednesday November 1, 2017 -SINGLE/DOUBLE Occupancy 1 Nt $295 Per Room Per Night',
            'rate' => '$295.00'  
        ],[
            'departure_date' => 'Depart Thursday November 2, 2017 -SINGLE/DOUBLE Occupancy 2 Nts $295 Per Room Per Night',
            'rate' => '$590.00'  
        ],[
            'departure_date' => 'Depart Friday November 3, 2017 SINGLE/DOUBLE Occupancy 3 Nts $295 Per Room Per Night',
            'rate' => '$885.00'  
        ]
        ]);
    }
}
