<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('virtualairline_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('icon_url')->nullable();
            $table->longText('dql')->nullable();
            $table->timestamps();
    
            $table->index('virtualairline_id');
        });
        
        Schema::create('user_achievements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('achievement_id');
            $table->timestamps();
    
            $table->index('user_id');
            $table->index('achievement_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('user_achievements');
    }
}
