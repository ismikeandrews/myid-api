<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDocumentoCidadao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbDocumentoCidadao', function(Blueprint $table){
            $table->increments('codDocumentoCidadao');
            $table->string('frenteDocumentoCidadao');
            $table->string('versoDocumentoCidadao');
            $table->integer('codDocumento')->unsigned();
            $table->integer('codCidadao')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbDocumentoCidadao', function($table){
            $table->foreign('codDocumento')->references('codDocumento')->on('tbDocumento');
            $table->foreign('codCidadao')->references('codCidadao')->on('tbCidadao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbDocumentoCidadao', function (Blueprint $table) {
            $table->dropForeign(['codDocumento']);
            $table->dropForeign(['codCidadao']);
            $table->dropIfExists();
        });
    }
}
