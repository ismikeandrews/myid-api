<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDocumentoCampoOpcao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbDocumentoCampoOpcao', function(Blueprint $table){
            $table->increments('codDocumentoCampoOpcao');
            $table->string('nomeOpcao');
            $table->string('valorOpcao');
            $table->string('codDocumentoCampo')->unsigned();
        });

        Schema::table('tbDocumentoCampoOpcao', function($table){
            $table->foreign('codDocumentoCampo')->references('codDocumentoCampo')->on('tbDocumentoCampo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbDocumentoCampoOpcao', function (Blueprint $table) {
            $table->dropForeign(['codDocumentoCampo']);
            $table->dropIfExists();
        });
    }
}
