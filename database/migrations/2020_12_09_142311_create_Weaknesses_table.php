<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaknessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Weaknesses', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('pokedex_id')->nullable();
            $table->float('bug', 10, 0)->nullable();
            $table->float('dragon', 10, 0)->nullable();
            $table->float('electric', 10, 0)->nullable();
            $table->float('fairy', 10, 0)->nullable();
            $table->float('fight', 10, 0)->nullable();
            $table->float('fire', 10, 0)->nullable();
            $table->float('flying', 10, 0)->nullable();
            $table->float('ghost', 10, 0)->nullable();
            $table->float('grass', 10, 0)->nullable();
            $table->float('ground', 10, 0)->nullable();
            $table->float('ice', 10, 0)->nullable();
            $table->float('normal', 10, 0)->nullable();
            $table->float('poison', 10, 0)->nullable();
            $table->float('psychic', 10, 0)->nullable();
            $table->float('rock', 10, 0)->nullable();
            $table->float('steel', 10, 0)->nullable();
            $table->float('water', 10, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Weaknesses');
    }
}
