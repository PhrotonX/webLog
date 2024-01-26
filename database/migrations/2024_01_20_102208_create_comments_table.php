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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->longText('content');
            $table->integer('likes')->nullable();
            $table->integer('dislikes')->nullable();
            $table->integer('view')->nullable();
            
            // Foreign keys
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->foreign('user_id')->references('id')->on('accounts');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};