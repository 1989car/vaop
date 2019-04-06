<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('citypair_id');
            $table->bigInteger('airlineoperator_id');
            $table->bigInteger('aircraftfamily_id');
            $table->integer('number');
            $table->string('daysoperated');
            $table->time('departure_time_utc')->nullable();
            $table->time('arrival_time_utc')->nullable();
            $table->boolean('next_day')->default(false);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('citypair_id');
            $table->index('airlineoperator_id');
            $table->index('aircraftfamily_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
}
