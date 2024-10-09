<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('account', function(Blueprint $table){
            $table->bigIncrements('account_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('username');
            $table->string('handle');
            $table->date('birthdate');
            $table->string('country');
            $table->char('gender', 1);
            $table->string('email');
            $table->string('password');
        });

        Schema::create('post', function(Blueprint $table){
            $table->bigIncrements('post_id');
            $table->int('category_id');
            $table->string('title');
            $table->mediumText('description_file_html');
            $table->mediumText('metadata_file_xml');
            $table->foreignId(Category, 'category_id');
        });

        Schema::create('tag', function(Blueprint $table){
            $table->string('tag_name');
            $table->primary('tag_name');
        });

        Schema::create('post.comment', function(Blueprint $table){
            $table->bigIncrements('comment_id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('replied_comment_id');
            $table->mediumText('content');
        });

        Schema::create('post.liked', function(Blueprint $table){
            $table->bigIncrements('like_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('account_id');
            $table->boolean('is_liked');
            $table->primary(['like_id', 'post_id']);
            $table->foreignId(User, 'account_id');
        });

        Schema::create('post.commment.liked', function(Blueprint $table){
            $table->bigIncrements('like_id');
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('account_id');
            $table->boolean('is_liked');
            $table->primary(['like_id', 'comment_id']);
            $table->foreignId(User, 'account_id');
        });

        Schema::create('post.tag', function(Blueprint $table){
            $table->unisgnedBigIncrements('tag_name');
            $table->unsignedBigIncrements('post_id');
            $table->primary(['tag_name', 'post_id']);
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
