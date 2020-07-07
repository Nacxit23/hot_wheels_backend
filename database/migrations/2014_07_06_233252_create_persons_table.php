<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->char('genre', 1);
            $table->date('date_birth');
            $table->id();
            $table->string('city', 60);
            $table->string('first_name', 80);
            $table->string('identification')->unique();
            $table->string('last_name', 80);
            $table->string('name')->virtualAs('CONCAT(first_name, " ", last_name)');
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
        Schema::dropIfExists('persons');
    }
}
