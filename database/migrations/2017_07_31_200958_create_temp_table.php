<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->string('is_active');
            $table->string('temp_link');
            $table->string('thumb_image');
            $table->string('thumb_file');
            $table->string('other_files');
            $table->mediumText('thumb_images');
            $table->mediumText('temp_description');
            $table->mediumText('more_detail');
            $table->mediumText('stat_details');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('published_date');
            $table->timestamp('reviewed_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temps');
    }
}
