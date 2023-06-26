<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            //$table->id(); not need

            // from lara 7 new format
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('article_id');
            // // внешний ключ
            // $table->foreign('article_id')->references('id')->on('articles');

            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('tag_id');
            // $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
