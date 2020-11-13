<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbDocumento', function(Blueprint $table){
            $table->increments('codDocumento');
            $table->string('nomeDocumento');
            $table->string('imagemDocumento');
            $table->string('codOrgaoEmissor')->unsigned();
        });

        Schema::table('tbDocumento', function($table){
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
        Schema::table('tbDocumento', function (Blueprint $table) {
            $table->dropForeign(['codOrgaoEmissor']);
            $table->dropIfExists();
        });
    }
}
