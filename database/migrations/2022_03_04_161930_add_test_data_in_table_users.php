<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestDataInTableUsers extends Migration
{
    public function up()
    {
        DB::table('users')->insert(
            array(
                'name' => 'Алик',
                'surname' => 'Абдушукуров',
                'patr' => 'ААБ',
                'phone' => '89372169430',
                'dateborn' => '2002-02-14',
                'login' => 'sparrko',
                'password' => '$2a$12$IsfNZY3aQXxymDTQFtMIde5ptlaPQ9USyygIct0RKGK3R3h9lJJ4e', // zasada
                'type' => 'dev',
                'created_at' => '2022-02-27 20:09:47',
                'updated_at' => '2022-02-27 20:09:47'
            )
        );
    }

    public function down()
    {

    }
}
