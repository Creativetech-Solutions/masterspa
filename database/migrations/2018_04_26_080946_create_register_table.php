<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comp_name');
            $table->string('fname');
            $table->string('lname');
            $table->string('tel');
            $table->string('cell');
            $table->string('email');
            $table->string('email_alt');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->string('emerg_contact');
            $table->string('emerg_phone');
            $table->string('preference');
            $table->string('special_need');
            $table->integer('num_of_travlers');
            $table->string('meeting_participants');
            $table->string('extend_trip');
            $table->string('european_dealer');
            $table->string('airfare_quote');
            $table->string('service_class');
            $table->string('dpt_city');
            $table->date('dpt_date');
            $table->date('pref_dpt_time');
            $table->date('ret_date');
            $table->date('pref_ret_time');
            $table->string('pref_airline');
            $table->string('freq_flyer_no');
            $table->string('payment_method');
            $table->text('special_notes');
            $table->string('send_invoice');
            $table->text('special_circumstances');
            $table->integer('save_info');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register');
    }
}
