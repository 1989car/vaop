<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAircraftTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('manufacturer_id');
            $table->string('model');
            $table->string('type');
            $table->string('engine_type');
            $table->integer('engine_count');
            $table->string('wtc', 1);
            $table->string('icao',4);
            $table->string('iata',3)->nullable();
            $table->boolean('allow_sync')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('manufacturer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aircraft_types');
    }
}
