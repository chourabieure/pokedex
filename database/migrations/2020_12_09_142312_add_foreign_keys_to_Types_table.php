<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Types', function (Blueprint $table) {
            
            $table->foreign('id_pok')
            ->references('id')
            ->on('Pokedex')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Types', function (Blueprint $table) {
            $table->dropForeign(['id_pok']);
            $table->dropColumn('id_pok');
        });
    }
}
