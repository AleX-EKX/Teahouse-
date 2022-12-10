<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsOfLastTables extends Migration
{
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->foreign('idMenuType')->references('id')->on('menuTypes'); // Связь
        });

        Schema::table('ticketsLogs', function (Blueprint $table) {
            $table->foreign('idTicket')->references('id')->on('tickets'); // Связь
            $table->foreign('idUser')->references('id')->on('users'); // Связь
        });
    }

    public function down()
    {
    }
}
