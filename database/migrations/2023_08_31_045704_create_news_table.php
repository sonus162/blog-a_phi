<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('desc_short')->nullable();
            $table->text('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
            $table->integer('id_news_category');
            $table->integer('display')->nullable();
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
