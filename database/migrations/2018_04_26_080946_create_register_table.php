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
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comp_name')->nullable();;
            $table->string('fname')->nullable();;
            $table->string('lname')->nullable();;
            $table->string('tel')->nullable();;
            $table->string('cell')->nullable();;
            $table->string('email')->nullable();;
            $table->string('email_alt')->nullable();;
            $table->string('address')->nullable();;
            $table->string('city')->nullable();;
            $table->string('state')->nullable();;
            $table->string('zip')->nullable();;
            $table->string('country')->nullable();;
            $table->string('emerg_contact')->nullable();;
            $table->string('emerg_phone')->nullable();;
            $table->string('preference')->nullable();;
            $table->string('special_need')->nullable();;
            $table->integer('num_of_travlers')->nullable();;
            $table->string('meeting_participants')->nullable();;
            $table->string('extend_trip')->nullable();;
            $table->string('european_dealer')->nullable();;
            $table->string('airfare_quote')->nullable();;
            $table->string('service_class')->nullable();;
            $table->string('dpt_city')->nullable();;
            $table->date('dpt_date')->nullable();;
            $table->date('pref_dpt_time')->nullable();;
            $table->date('ret_date')->nullable();;
            $table->date('pref_ret_time')->nullable();;
            $table->string('pref_airline')->nullable();;
            $table->string('freq_flyer_no')->nullable();;
            $table->string('payment_method')->nullable();;
            $table->text('special_notes')->nullable();;
            $table->string('send_invoice')->nullable();;
            $table->text('special_circumstances')->nullable();;
            $table->integer('save_info')->nullable();;
            $table->integer('status')->nullable();;
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
