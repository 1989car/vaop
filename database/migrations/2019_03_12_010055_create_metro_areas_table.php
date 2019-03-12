<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetroAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metro_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subdivision_id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
            $table->softDeletes();
    
            $table->index('subdivision_id');
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metro_areas');
    }
}
