<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbConsultorDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbConsultorDocumento', function(Blueprint $table){
            $table->increments('codConsultorDocumento');
            $table->integer('codConsultor')->unsigned();
            $table->integer('codDocumento')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbConsultorDocumento', function($table){
            $table->foreign('codConsultor')->references('codConsultor')->on('tbConsultor');
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
        Schema::table('tbConsultorDocumento', function (Blueprint $table) {
            $table->dropForeign(['codConsultor']);
            $table->dropForeign(['codDocumento']);
            $table->dropIfExists();
        });
    }
}
