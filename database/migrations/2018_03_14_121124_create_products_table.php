<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned()->nullable()->default(null);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->string('thumb_image');
            $table->mediumText('all_images')->nullable()->default(null);
            $table->mediumText('product_detail')->nullable()->default(null);
            $table->integer('price')->nullable()->default(0);
            $table->integer('purchase_price')->nullable()->default(0);
            $table->tinyInteger('display_order')->nullable()->default(0);
            $table->tinyInteger('is_published');
            $table->tinyInteger('stock_quantity')->nullable()->default(0);
            $table->mediumText('note')->nullable()->default(null);
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
        Schema::dropIfExists('products');
    }
}
