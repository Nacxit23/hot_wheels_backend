<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        date_default_timezone_set("America/Managua");

        Schema::create('comments', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->foreignId('sells_id')->references('id')->on('sells')->onDelete('cascade')->nullable();
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->id();
            $table->text('comment');
            $table->dateTime("commentTime")->default(date('Y-m-d H:i:s'))->nullable();
            $table->string("state")->nullable();
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
        Schema::dropIfExists('comments');
    }
}
