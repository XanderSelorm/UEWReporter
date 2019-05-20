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
            $table->string('title');
            $table->string('slug')->nullable();
            $table->mediumText('body');
            $table->string('cover_image')->default('noimage.jpg')->nullable();
            $table->integer('user_id');
            $table->timestamps();
            $table->integer('category_id')->unsigned()->nullable();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
