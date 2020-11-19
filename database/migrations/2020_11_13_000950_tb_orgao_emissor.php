<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbOrgaoEmissor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbOrgaoEmissor', function(Blueprint $table){
            $table->increments('codOrgaoEmissor');
            $table->string('nomeOrgaoEmissor');
            $table->string('siglaOrgaoEmissor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbOrgaoEmissor');
    }
}
