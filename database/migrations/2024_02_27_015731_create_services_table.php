<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc_short')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->integer('star')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('price')->nullable();
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->integer('is_home')->nullable();
            $table->integer('display')->nullable();
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
        Schema::dropIfExists('services');
    }
}
