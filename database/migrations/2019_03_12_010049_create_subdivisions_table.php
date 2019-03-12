<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubdivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdivisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('country_id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
            $table->softDeletes();
    
            $table->index('country_id');
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
        Schema::dropIfExists('subdivisions');
    }
}
