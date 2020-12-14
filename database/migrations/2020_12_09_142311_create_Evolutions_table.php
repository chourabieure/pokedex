<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evolutions', function (Blueprint $table) {
            
            $table->id();
            $table->integer('lvl_evol_pok');
            $table->unsignedBigInteger('id_pok_base');
            $table->unsignedBigInteger('id_pok_evol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Evolutions');
    }
}
