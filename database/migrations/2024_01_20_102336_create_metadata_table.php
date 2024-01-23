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
        Schema::create('metadata', function (Blueprint $table) {
            $table->id('metadata_id');
            $table->bigInteger('revision');
            $table->string('tags', 255);
            $table->longText('metadata');
            
            // Foreign key
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('post_id')->on('posts');
            
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
        Schema::dropIfExists('metadata');
    }
};
