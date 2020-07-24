<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->boolean('active')->default(1);
            $table->id();
            $table->rememberToken();
            $table->string('email')->unique();
            $table->string('nameUser')->unique();
            $table->string('password');
            $table->string('token', 80)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('genre', 1);
            $table->date('date_birth');
            $table->string('city', 60);
            $table->string('first_name', 80);
            $table->string('identification')->unique();
            $table->string('last_name', 80);
            $table->string('name')->virtualAs('CONCAT(first_name, " ", last_name)');
            $table->integer("phone_number");
            $table->string("address");
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
        Schema::dropIfExists('users');
    }
}
