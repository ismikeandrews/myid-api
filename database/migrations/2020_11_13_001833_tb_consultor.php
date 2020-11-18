<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbConsultor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbConsultor', function(Blueprint $table){
            $table->increments('codConsultor');
            $table->string('nomeConsultor');
            $table->string('cnpjConsultor');
            $table->integer('codTipoConsultor')->unsigned();
        });

        Schema::table('tbConsultor', function($table){
            $table->foreign('codTipoConsultor')->references('codTipoConsultor')->on('tbTipoConsultor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbConsultor', function (Blueprint $table) {
            $table->dropForeign(['codTipoConsultor']);
            $table->dropIfExists();
        });
    }
}
