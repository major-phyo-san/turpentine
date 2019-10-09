<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('hallLocationId')->references('id')->on('hall_locations');
            $table->float('room_area');
            $table->int('max_occupancy_capacity');
            $table->float('price_per_hour');
            $table->text('facility');
            $table->enum('room_type',[
                'Standing spectator areas, Bar areas','Amusement arcade','Assembly hall','Bingo hall',
                'Club','Dance floor','Pop concert venue','Concourse, Shopping mall',
                'Committee room, common room, conference room','Meeting room, reading room',
                'Restaurant','Exhibition hall','Art gallery, museum','Workshop'
            ]);
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
        Schema::dropIfExists('rooms');
    }
}
