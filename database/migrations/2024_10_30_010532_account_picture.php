<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('PICTURE', function(Blueprint $table){
            $table->unsignedBigInteger('picture_id')->autoIncrement();
            $table->string('picture_path');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ACCOUNT_PROFILE_PICTURE', function(Blueprint $table){
            $table->unsignedBigInteger('picture_id');
            $table->unsignedBigInteger('account_id');
            $table->primary(['picture_id', 'account_id']);
        });

        Schema::create('ACCOUNT_BANNER_PICTURE', function(Blueprint $table){
            $table->unsignedBigInteger('picture_id');
            $table->unsignedBigInteger('account_id');
            $table->primary(['picture_id', 'account_id']);
        });


        Schema::table('ACCOUNTS', function(Blueprint $table){
            $table->unsignedBigInteger('profile_picture_id')->nullable();
            $table->unsignedBigInteger('profile_banner_id')->nullable();
            $table->foreign('profile_picture_id')->references('picture_id')->on('ACCOUNT_PROFILE_PICTURE');
            $table->foreign('profile_banner_id')->references('picture_id')->on('ACCOUNT_BANNER_PICTURE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PICTURE');
        Schema::dropIfExists('ACCOUNT_PICTURE');
        Schema::dropIfExists('ACCOUNT_PROFILE_PICTURE');
        Schema::dropIfExists('ACCOUNT_BANNER_PICTURE');
        Schema::table('ACCOUNTS', function(Blueprint $table){
            $table->dropColumn('profile_picture_id');
            $table->dropColumn('profile_banner_id');
        });
    }
};
