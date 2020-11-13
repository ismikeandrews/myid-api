<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbFuncionario', function(Blueprint $table){
            $table->increments('codFuncionario');
            $table->string('codUsuario')->unsigned();
            $table->string('codOrgaoEmissor')->unsigned();
        });

        Schema::table('tbFuncionario', function($table){
            $table->foreign('codUsuario')->references('codUsuario')->on('tbUsuario');
            $table->foreign('codOrgaoEmissor')->references('codOrgaoEmissor')->on('tbOrgaoEmissor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbFuncionario', function (Blueprint $table) {
            $table->dropForeign(['codUsuario']);
            $table->dropForeign(['codOrgaoEmissor']);
            $table->dropIfExists();
        });
    }
}
