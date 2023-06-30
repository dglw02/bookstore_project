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
        Schema::create('invoices_detail', function (Blueprint $table) {
            $table->increments('invoices_detail_id');
            $table->unsignedInteger('invoices_id');
            $table->unsignedInteger('books_id');
            $table->integer('quantity');
            $table->double('price', 8, 2);
            $table->timestamps();
            $table->foreign('invoices_id')->references('invoices_id')->on('invoices');
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
        Schema::dropIfExists('invoices_detail');
    }
};
