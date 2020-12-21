<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaImageablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media__imageables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');
            $table->string('imageable_type');
            $table->unsignedBigInteger('imageable_id');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('media__imageables', function (Blueprint $table) {
            $table->foreign('file_id')->references('id')->on('media__files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media__imageables');
    }
}
