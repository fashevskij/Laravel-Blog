<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //миграция для связи постов и тегов
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');//уникальный айди
            $table->integer('tag_id',false,true);//поле с таблицы тегов
            $table->integer('post_id',false,true);//поле с таблицы пост
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
        Schema::dropIfExists('post_tag');
    }
}
