<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCidadao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbCidadao', function(Blueprint $table){
            $table->increments('codCidadao');
            $table->string('cpfCidadao')->unsigned();
            $table->string('codUsuario')->unsigned();
        });

        Schema::table('tbCidadao', function($table){
            $table->foreign('codUsuario')->references('codUsuario')->on('tbUsuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbCidadao', function (Blueprint $table) {
            $table->dropForeign(['codUsuario']);
            $table->dropIfExists();
        });
    }
}
