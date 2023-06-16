<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('cost_type_id')->unsigned();
            $table->foreign('cost_type_id')->references('id')->on('cost_types')->onDelete('cascade');
            $table->double('amount');
            $table->text('note')->nullable();
            $table->timestamp('incurred_date');
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
        Schema::drop('costs');
    }
}


