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
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->unsignedInteger('orders_id');
            $table->unsignedInteger('books_id');
            $table->double('books_price', 8, 2);
            $table->integer('order_quantity');
            $table->timestamps();

            $table->foreign('orders_id')->references('orders_id')->on('orders');
            $table->foreign('books_id')->references('books_id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
