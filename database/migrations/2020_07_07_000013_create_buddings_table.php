<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddings', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->dateTime('date_budding');
            $table->double('price');
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->id();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('buddings');
    }
}
