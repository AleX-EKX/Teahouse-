<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Сообщения для пользователей (новости)
        Schema::create('msgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->timestamp('created_at')->useCurrent = true;
        });

        // Категории в меню
        Schema::create('menuTypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('archived_at')->nullable();
            // $table->binary('img')->nullable();
        });
        DB::statement("ALTER TABLE menuTypes ADD img MEDIUMBLOB NULL");

        // Меню
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->bigInteger('idMenuType')->unsigned();
            // Хранит все ценовые значения и связанно с граммовкой
            //          (цены в рублях, граммовка в граммах).
            //      Пример {[price:200, mass:'40'] [price:400, mass:'100']}
            $table->json('price', 9, 2);
            $table->string('desc', 200)->nullable(); // Описание: граммовка
            // $table->binary('img')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
        DB::statement("ALTER TABLE menu ADD img MEDIUMBLOB NULL");

        // Заявки
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('basket');
            $table->datetime('dateCreate')->useCurrent();
            $table->datetime('dateClose')->nullable();
            $table->datetime('dateCancel')->nullable();
            $table->bigInteger('idWaiter')->unsigned()->nullable();
            $table->foreign('idWaiter')->references('id')->on('users');
            $table->enum('status', ['new', 'in_work', 'ready', 'given_away', 'closed' ]);
            $table->integer('countPeople');
            $table->integer('numTable');
        });

        // Логи заявок
        Schema::create('ticketsLogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idTicket')->unsigned();
            $table->bigInteger('idUser')->unsigned();
            $table->string('text', 200); // Офицант <N> создал заявку № <N>
        });
    }

    public function down()
    {
        Schema::dropIfExists('msgs');
        Schema::dropIfExists('menuTypes');
        Schema::dropIfExists('menu');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticketsLogs');
    }
}
