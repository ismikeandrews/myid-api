<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDocumentoCampo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbDocumentoCampo', function(Blueprint $table){
            $table->increments('codDocumentoCampo');
            $table->string('nomeCampo');
            $table->string('tipoCampo');
            $table->integer('codDocumento')->unsigned();
        });

        Schema::table('tbDocumentoCampo', function($table){
            $table->foreign('codDocumento')->references('codDocumento')->on('tbDocumento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbDocumentoCampo', function (Blueprint $table) {
            $table->dropForeign(['codDocumento']);
            $table->dropIfExists();
        });
    }
}
