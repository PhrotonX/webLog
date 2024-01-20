<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id('reply_id');
            $table->string('title', 255);
            $table->longText('content')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('dislikes')->nullable();
            $table->integer('view')->nullable();
            $table->dateTime('date_created');
            $table->dateTime('date_modified');
            
            // Foreign keys
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->foreign('comment_id')->references('comment_id')->on('comments');
            $table->foreign('user_id')->references('id')->on('accounts');
            
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
        Schema::dropIfExists('replies');
    }
};
