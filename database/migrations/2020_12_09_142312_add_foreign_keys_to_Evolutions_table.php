<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEvolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Evolutions', function (Blueprint $table) {
            $table->foreign('id_pok_base')
                    ->references('id')
                    ->on('Pokedex')
                    ->onUpdate('RESTRICT')
                    ->onDelete('RESTRICT');

            $table->foreign('id_pok_evol')
                    ->references('id')
                    ->on('Pokedex')
                    ->onUpdate('RESTRICT')
                    ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Evolutions', function (Blueprint $table) {
            $table->dropForeign(['id_pok_base']);
            $table->dropColumn('id_pok_base');

            $table->dropForeign(['id_pok_evol']);
            $table->dropColumn('id_pok_evol');
        });
    }
}
