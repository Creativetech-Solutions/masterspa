<?php

use Illuminate\Database\Seeder;

class arrival_datesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('arrival_dates')->insert([

        	[
            'arrival_date' => 'Arrive Thursday October 26, 2017 -SINGLE/DOUBLE Occupancy 3 Nts $295 Per Room Per Night',
            'rate' => '$885.00'  
        ],[
            'arrival_date' => 'Arrive Friday October 27, 2017 -SINGLE/DOUBLE Occupancy 2 Nts $295 Per Room Per Night',
            'rate' => '$590.00'  
        ],[
            'arrival_date' => 'Arrive Saturday October 28, 2017 -SINGLE/DOUBLE Occupancy 1 Nt $295 Per Room Per Night',
            'rate' => '$295.00'  
        ],[
            'arrival_date' => 'Arrive Sunday October 29, 2017 - NORMAL ARRIVAL DATE - SINGLE/DOUBLE Occupancy - No Additonal Charge',
            'rate' => '$0.00'  
        ],[
            'arrival_date' => 'EUROPEAN DEALERS - ARRIVE OCTOBER 28 AT NO ADDITIONAL COST.',
            'rate' => '$0.00'  
        ]
        ]);
    }
}
