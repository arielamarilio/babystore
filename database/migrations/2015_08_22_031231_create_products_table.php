<?php

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

            $table->integer('categorie_id')->unsigned()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('set null');
            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->string('title', 255);
            $table->text('description');
            $table->enum('gender', array('male', 'female'));
            $table->tinyInteger('state');
            $table->decimal('price', 10, 2);
            $table->decimal('monetary_discount', 10, 2);
            $table->integer('percentage_discount');
            $table->integer('rating_up');
            $table->integer('rating_down');
            $table->tinyInteger('situation');
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
        Schema::drop('products');
    }
}
