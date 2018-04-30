<?php

use Illuminate\Database\Seeder;

class attendee_extended_nightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendee_extended_nights')->insert([

        	[
            'extended_night' => '3rd Adult in 1 room ( 9 years and Older) Program Dates Only',
            'rate' => '$425.00'  
        ],[
            'extended_night' => '3rd and 4th Adult in 1 room ( 9 years and Older ) Program Dates Only $425 per person',
            'rate' => '$850.00'  
        ],[
            'extended_night' => '1 Child 3-8 years in room with 2 adults Program Dates Only',
            'rate' => '$325.00'  
        ],[
            'extended_night' => '2 Children 3-8 years in room with 2 adults Program Dates Only',
            'rate' => '$650.00'  
        ],[
            'extended_night' => '3 Children 3-8 years in room with 2 adults Program Dates Only',
            'rate' => '$975.00'  
        ],[
            'extended_night' => '1 Adult (9 years & older and 1 child (3-8 years) Program Dates only',
            'rate' => '$750.00'  
        ],[
            'extended_night' => '1 Adult (9 years & older) and 2 children (3-8 years) Program Dates Only',
            'rate' => '$1075.00'  
        ],[
            'extended_night' => 'Children Under 3 years are FREE',
            'rate' => '$0.00'  
        ]
        ]);
    }
}
