<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');//уникальный айди
            $table->string('title');//тайтл
            $table->string('slug');//уникальное слово описывающее строку аналог тайтла для строки url
            $table->text('description');//краткое описание
            $table->text('content');//контент
            $table->integer('category_id',false,true);//связь категорий с постом /не автоинкр/ целое число без разделителей
            $table->integer('views',false,true)->default(0);//количество просмотров поста
            $table->string('img')->nullable();//картинка поста не обязательная
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
        Schema::dropIfExists('posts');
    }
}
