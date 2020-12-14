<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pokemon_1')->default(0);
            $table->unsignedBigInteger('pokemon_2')->default(0);
            $table->unsignedBigInteger('pokemon_3')->default(0);
            $table->unsignedBigInteger('pokemon_4')->default(0);
            $table->unsignedBigInteger('pokemon_5')->default(0);
            $table->unsignedBigInteger('pokemon_6')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
