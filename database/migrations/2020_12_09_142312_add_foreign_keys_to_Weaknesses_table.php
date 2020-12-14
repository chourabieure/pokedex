<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWeaknessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Weaknesses', function (Blueprint $table) {
            $table->foreign('pokedex_id')
            ->references('id')->on('Pokedex')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Weaknesses', function (Blueprint $table) {
            $table->dropForeign(['pokedex_id']);
            $table->dropColumn('pokedex_id');
        });
    }
}
