<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnqueteArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquete_archives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enquete_id');
            $table->integer('answer_id');
            $table->integer('item_id');
            $table->integer('taste');
            $table->integer('quarlity');
            $table->integer('volume');
            $table->string('comment');
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
        Schema::dropIfExists('enquete_archives');
    }
}
