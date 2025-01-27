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
            $table->unsignedBigInteger('pfp_id');
            $table->unsignedBigInteger('picture_id');
            $table->string('pfp_small');
            $table->string('pfp_medium');
            $table->string('pfp_large');
            $table->primary(['pfp_id', 'picture_id']);
        });

        Schema::table('account_profile_picture', function(Blueprint $table){
            $table->renameColumn('picture_id', 'pfp_id');
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
    }
};
