<?php

use Illuminate\Database\Seeder;

class ReportCheckboxesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('report_checkboxes')->insert([
            'name' => 'Default',
            'type' => 'default',
            'report' => '',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
    }
}
