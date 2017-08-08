<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatsRenameMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories',  function(Blueprint $table){
            $table->renameColumn('`meta-title`', 'meta_title');
            $table->renameColumn('`meta-keywords`', 'meta_keywords');
            $table->renameColumn('`meta-description`', 'meta_description');
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
