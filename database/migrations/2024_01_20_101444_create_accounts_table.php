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
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('username', 255);
            $table->char('email', 255);
            $table->string('password_hash', 255);
            $table->tinyInteger('securepassword')->nullable();
            $table->tinyInteger('newaccount')->nullable();
            $table->enum('type', ['member', 'premium', 'staff', 'admin', 'owner'])->nullable();
            $table->datetime('joindate')->nullable();
            $table->char('firstname', 255)->nullable();
            $table->char('middlename', 255)->nullable();
            $table->char('lastname', 255)->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('age');
            $table->char('gender', 1)->nullable();
            $table->binary('description')->nullable();
            $table->char('country', 255)->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
            $table->softDeletes(); // Adds deleted_at column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
