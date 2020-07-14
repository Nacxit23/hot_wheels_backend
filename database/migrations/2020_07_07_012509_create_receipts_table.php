<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->double('individual_sum');
            $table->double('total_sum');
            $table->foreignId('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->foreignId('sells_id')->references('id')->on('sells')->onDelete('cascade')->nullable();
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->id();
            $table->string('rup-number');
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
        Schema::dropIfExists('receipts');
    }
}
