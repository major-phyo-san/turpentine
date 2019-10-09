<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_status', function(){
            $table->bigIncrements('id');
            $table->foreign('roomId')-references('rooms')->on('id');
            $table->datetime('event_start_time');
            $table->datetime('event_end_time');
            $table->enum('status',['Event pending','Evnet in progress']);
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
