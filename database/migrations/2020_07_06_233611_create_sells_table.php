<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->dateTime('datetime',0);
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('type_pay_id')->references('id')->on('type_pays')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->id();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('sells');
    }
}
