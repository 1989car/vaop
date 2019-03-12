<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_operators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('virtualairline_id');
            $table->string('country_id');
            $table->string('airlinebrand_id');
            $table->string('name');
            $table->string('callsign');
            $table->string('iata',2)->nullable();
            $table->string('icao',3)->nullable();
            $table->string('type');
            $table->string('logo_url');
            $table->string('icon_url');
            $table->timestamps();
            $table->softDeletes();
    
            $table->index('virtualairline_id');
            $table->index('country_id');
            $table->index('airlinebrand_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_operators');
    }
}
