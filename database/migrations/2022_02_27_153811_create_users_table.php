<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('patr', 50);
            $table->string('phone', 11); // 8 9372 169 430
            $table->date('dateborn');
            $table->string('login')->unique();
            $table->string('password');
            $table->enum('type', ['admin', 'cook', 'waiter', 'dev', 'ban'])->default('ban');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
