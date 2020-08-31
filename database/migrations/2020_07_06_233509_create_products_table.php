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
            $table->id();
            $table->string('size');
            $table->string('body_type');
            $table->string('color')->comment('The color is a hexadecimal');
            $table->string('mark', 50);
            $table->string('name', 80);
            $table->string('type');
            $table->double('tire_state')->nullable();
            $table->string("category")->default("Toy coleccion");
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
