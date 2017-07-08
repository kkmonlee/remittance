<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_checks', function (Blueprint $table) {
            $table->integer('UserID');
            $table->integer('BandID');
            $table->bigInteger('RFID')->nullable();
            $table->string('Team')->nullable();
            $table->dateTime('Checkout')->nullable();
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
        Schema::dropIfExists('event_checks');
    }
}
