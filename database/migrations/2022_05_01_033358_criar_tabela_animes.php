<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAnimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes',function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('sinopse');
            $table->integer('user_id');
            //$table->foreign('user_id')
            //->references('id')
            //->on('users');
            //$table->int('episodios')->nullable;
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('animes');
    }
}
