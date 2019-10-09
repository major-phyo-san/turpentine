<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HallLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hall_locations', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->foreign('hallId')->references('id')->on('halls');
            $table->string('contact_phone');
            $table->string('city');
            $table->string('township');
            $table->text('address');
            $table->int('number_of_rooms');
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
        //
    }
}
