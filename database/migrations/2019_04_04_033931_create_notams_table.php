<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('icao', 4)->nullable();
            $table->longText('body');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notams');
    }
}
