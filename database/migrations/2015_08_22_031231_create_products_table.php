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

            // $table->integer('brand_id')->unsigned()->nullable();
            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->string('brand', 455)->nullable();            

            $table->string('title', 455)->nullable();
            $table->text('description')->nullable();
            $table->enum('gender', array('male', 'female', 'both', 'none'))->nullable();
            $table->tinyInteger('state')->nullable();
            $table->decimal('original_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('monetary_discount', 10, 2)->nullable();
            $table->integer('percentage_discount')->nullable();
            $table->integer('rating_up')->nullable();
            $table->integer('rating_down')->nullable();
            $table->integer('situation')->nullable();
            $table->integer('delivery_method')->nullable();
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
