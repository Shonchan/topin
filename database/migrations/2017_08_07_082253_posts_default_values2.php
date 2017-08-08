<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsDefaultValues2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts',  function(Blueprint $table){
            $table->string('meta_title')->default(null)->change();
            $table->string('meta_keywords')->default(null)->change();
            $table->string('meta_description')->default(null)->change();
            $table->string('image')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
