<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityPairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_pairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('virtualairline_id');
            $table->bigInteger('origin_airport_id');
            $table->bigInteger('destination_airport_id');
            $table->timestamps();
            $table->softDeletes();
    
            $table->index('virtualairline_id');
            $table->index('origin_airport_id');
            $table->index('destination_airport_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_pairs');
    }
}
