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
            $table->boolean('active')->default(1);
            $table->date('date');
            $table->double('price')->default(0.0);
            $table->foreignId('product_categories_id')->references('id')->on('products_categories')->onDelete('cascade');
            $table->id();
            $table->integer('size');
            $table->string('body_type');
            $table->string('color')->comment('The color is a hexadecimal');
            $table->string('mark', 50);
            $table->string('name', 80);
            $table->string('type');
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
