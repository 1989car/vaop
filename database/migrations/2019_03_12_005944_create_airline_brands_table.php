<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('virtualairline_id');
            $table->string('name');
            $table->string('logo_url');
            $table->string('icon_url');
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('virtualairline_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_brands');
    }
}
