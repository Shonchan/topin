<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('url')->unique();
            $table->integer('category_id');
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->string('mets_description');
            $table->text('annotation');
            $table->longText('body');
            $table->tinyInteger('published')->default(0);
            $table->integer('author');
            $table->integer('editor');
            $table->string('image');
            $table->integer('browsed')->default(0);

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
