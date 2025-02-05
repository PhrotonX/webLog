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
        Schema::create('profile_picture', function(Blueprint $table){
            $table->bigIncrements('pfp_id');
            $table->unsignedBigInteger('picture_id');
            $table->string('pfp_xs')->nullable();
            $table->string('pfp_small')->nullable();
            $table->string('pfp_medium')->nullable();
            $table->string('pfp_large')->nullable();
            $table->foreign('picture_id')->references('picture_id')->on('picture')->onDelete('cascade');
        });

        Schema::table('account_profile_picture', function(Blueprint $table){
            $table->renameColumn('picture_id', 'pfp_id');
        });

        Schema::table('accounts', function(Blueprint $table){
            $table->dropForeign(['profile_picture_id']);

            $table->foreign('profile_picture_id')->references('pfp_id')->on('ACCOUNT_PROFILE_PICTURE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_picture');

        Schema::table('account_profile_picture', function(Blueprint $table){
            $table->renameColumn('pfp_id', 'picture_id');
        });

        Schema::table('accounts', function(Blueprint $table){
            $table->dropForeign(['profile_picture_id']);

            $table->foreign('profile_picture_id')->references('picture_id')->on('ACCOUNT_PROFILE_PICTURE');
        });
    }
};
