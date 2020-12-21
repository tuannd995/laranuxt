<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media__files', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('path');
            $table->string('extension');
            $table->string('mimetype');
            $table->string('filesize');
            $table->unsignedBigInteger('folder_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('media__files', function (Blueprint $table) {
            $table->foreign('folder_id')->references('id')->on('media__folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media__files');
    }
}
