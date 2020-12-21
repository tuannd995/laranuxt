<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('meta_title')->nullable();
            $table->unsignedBigInteger('post_img')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: draft, 1: publish');
            $table->text('content');
            $table->string('slug');
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('post_img')->references('id')->on('media__files');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('created_by')->references('id')->on('users');
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
}