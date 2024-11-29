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
        Schema::table('picture', function(Blueprint $table){
            $table->string('title')->nullable();

            //Main description for an image.
            $table->string('description')->nullable();

            /*A more detailed description for an image. Shall describe the image that can be understood
            by users with eyesight issues.
            */
            $table->string('alt_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('picture', function(Blueprint $table){
            $table->dropIfExists('title');
            $table->dropIfExists('description');
            $table->dropIfExists('alt_text');
        });
    }
};
