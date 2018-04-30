<?php

use Illuminate\Database\Seeder;

class attendee_datesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendee_dates')->insert([

        	[
            'attendee_date' => '3rd Adult in room ( over 18 years ) 1 Night in Addition to Program Nights',
            'rate' => '$25.00'  
        ],[
            'attendee_date' => '3rd Adult in room ( over 18 years ) 2 Nights in Addition to Program Nights',
            'rate' => '$50.00'  
        ],[
            'attendee_date' => '3rd Adult in room ( over 18 years ) 3 Nights in Addition to Program Nights',
            'rate' => '$75.00'  
        ],[
            'attendee_date' => '3rd & 4th Adult in room ( over 18 years ) 1 Night in Addition to Program Nights',
            'rate' => '$50.00'  
        ],[
            'attendee_date' => '3rd & 4th Adult in room ( over 18 years ) 2 Nights in Addition to Program Nights',
            'rate' => '$100.00'  
        ],[
            'attendee_date' => '3rd & 4th Adult in room (over 18 years ) 3 Nights in Addition to Program Nights',
            'rate' => '$150.00'  
        ]
        ]);
    }
}
