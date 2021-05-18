<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('brands_id');    
            $table->string('name');
            $table->double('price');
            $table->double('sale_price')->nullable();
            $table->integer('stock');
            $table->text('description');
            $table->text('image')->nullable();
            $table->boolean('status');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('brands_id')->references('id')->on('brands');
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
