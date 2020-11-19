<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbUsuario', function(Blueprint $table){
            $table->increments('codUsuario');
            $table->string('loginUsuario');
            $table->string('senhaUsuario');
            $table->integer('codTipoUsuario')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbUsuario', function($table){
            $table->foreign('codTipoUsuario')->references('codTipoUsuario')->on('tbTipoUsuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbUsuario', function (Blueprint $table) {
            $table->dropForeign(['codTipoUsuario']);
            $table->dropIfExists();
        });
    }
}
