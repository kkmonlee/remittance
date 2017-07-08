<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('UserID');
            $table->string('Forename');
            $table->string('Lastname');
            $table->string('KnownAs');
            $table->string('Age');
            $table->string('Gender');
            $table->string('Email');
            $table->string('PhoneNumber');
            $table->text('Address1');
            $table->text('Address2');
            $table->string('Postcode');
            $table->string('NOKName');
            $table->string('NOKRelation');
            $table->string('NOKNumber');
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
        Schema::dropIfExists('volunteers');
    }
}
