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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orders_id');
            $table->string('user_id');
            $table->string('orders_name');
            $table->string('orders_email');
            $table->string('orders_payment');
            $table->string('orders_address');
            $table->string('orders_phone',11);
            $table->string('orders_city');
            $table->integer('orders_status')->default(0);
            $table->string('orders_message')->nullable();
            $table->string('order_tracking');
            $table->string('orders_price');
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
};
