<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAircraftFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    
        Schema::create('aircraft_family_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('family_id');
            $table->bigInteger('type_id');
            $table->timestamps();
        
            $table->index('family_id');
            $table->index('type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aircraft_families');
        Schema::dropIfExists('aircraft_family_types');
    }
}
