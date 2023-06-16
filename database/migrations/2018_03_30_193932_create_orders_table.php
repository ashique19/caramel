<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('name');
            $table->string('address');
            $table->string('area');
            $table->string('city');
            $table->string('state');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->integer('subtotal')->default(0);
            $table->integer('charge')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('total')->default(0);
            $table->timestamp('order_date')->nullable();
            $table->integer('courier_id')->unsigned()->nullable();
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('set null');
            $table->string('courier_name');
            $table->string('courier_tracker');
            $table->mediumText('courier_data');
            $table->double('delivery_charge')->default(0);
            $table->double('cod')->default(0);
            $table->double('courier_collectable_amount')->default(0);
            $table->double('collected_amount')->default(0);
            $table->double('due_amount')->default(0);
            $table->double('paid_amount')->default(0);
            $table->string('payment_gateway');
            $table->string('courier_balance_before_delivery')->default(0);
            $table->string('courier_balance_after_delivery')->default(0);
            $table->timestamp('dispatch_date')->nullable();
            $table->timestamp('expected_delivery_date')->nullable();
            $table->timestamp('actual_delivery_date')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('status')->default('New'); // text field. e.g. New, Dispatched, Delivered, Cancel and Return
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
        Schema::dropIfExists('orders');
    }
}
