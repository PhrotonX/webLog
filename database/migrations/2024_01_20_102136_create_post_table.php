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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('title', 255);
            $table->longText('content')->nullable();
            $table->string('category', 255)->nullable();
            $table->integer('likes')->nullable();
            $table->integer('dislikes')->nullable();
            $table->integer('view')->nullable();
            $table->dateTime('date_created');
            $table->dateTime('date_modified');
            
            // Foreign key
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('posts');
    }
};
