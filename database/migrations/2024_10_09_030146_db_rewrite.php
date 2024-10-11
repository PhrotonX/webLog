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
        Schema::dropIfExists('replies');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('metadata');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('accounts');
        
        Schema::create('accounts', function(Blueprint $table){
            $table->unsignedBigInteger('account_id');
            $table->primary('account_id');
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
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categories', function(Blueprint $table){
            $table->unsignedInteger('category_id');
            $table->primary('category_id');
            $table->string('category_name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('posts', function(Blueprint $table){
            $table->unsignedInteger('category_id');
            $table->unsignedBigInteger('post_id');
            $table->string('title');
            $table->mediumText('description_file_html');
            $table->mediumText('metadata_file_xml');
            $table->primary('post_id');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tags', function(Blueprint $table){
            $table->string('tag_name');
            $table->primary('tag_name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('post_comments', function(Blueprint $table){ 
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('account_id');
            $table->primary('comment_id');
            $table->foreign('account_id')->references('account_id')->on('accounts')->onDelete('cascade');
            $table->mediumText('content');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('post_comment_replies', function(Blueprint $table){ 
            $table->unsignedBigInteger('reply_id');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('reply_id')->references('comment_id')->on('post_comments')->onDelete('cascade');
            $table->foreign('parent_id')->references('comment_id')->on('post_comments')->onDelete('cascade');
        });

        Schema::create('liked_posts', function(Blueprint $table){
            $table->unsignedBigInteger('like_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('account_id');
            $table->boolean('is_liked');
            $table->primary(['like_id', 'post_id']);
            $table->foreign('account_id')->references('account_id')->on('accounts')->onDelete('cascade');
        });

        Schema::create('liked_post_comments', function(Blueprint $table){
            $table->unsignedBigInteger('like_id');
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('account_id');
            $table->boolean('is_liked');
            $table->primary(['like_id', 'comment_id']);
            $table->foreign('account_id')->references('account_id')->on('accounts')->onDelete('cascade');
        });

        Schema::create('post_tags', function(Blueprint $table){
            $table->string('tag_name');
            $table->unsignedBigInteger('post_id');
            $table->foreign('tag_name')->references('tag_name')->on('tags')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('liked_post_comments');
        Schema::dropIfExists('liked_posts');
        Schema::dropIfExists('post_comment_replies');
        Schema::dropIfExists('post_comments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('accounts');
    }

};
