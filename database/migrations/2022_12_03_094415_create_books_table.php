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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('books_id');
            $table->string('books_name');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('publisher_id');
            $table->text('books_description');
            $table->unsignedInteger('books_author');
            $table->integer('books_quantity');
            $table->string('books_image');
            $table->double('books_price', 8, 2);
            $table->integer('books_ISBN')->unique();
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('publisher_id')->references('publisher_id')->on('publishers');
            $table->foreign('books_author')->references('author_id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
