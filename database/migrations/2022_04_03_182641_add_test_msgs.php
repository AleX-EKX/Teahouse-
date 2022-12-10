<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestMsgs extends Migration
{

    public function up()
    {
        DB::table('msgs')->insert(
            [
                'text' => '<p>Всем привет!</p>
                <p>Мобильное приложение выходит на новый уровень, вероятно его уже можно назвать альфой.</p>
                <p>Теперь в нем реализованы:</p>
                <p>&nbsp;&nbsp;- динамическая подгрузка данных (ajax-route);</p>
                <p>&nbsp;&nbsp;- поддержка изображений b64 (нам по сути можно хранить картинки в БД);</p>
                <p>&nbsp;&nbsp;- отображение меню (категории, блюда с разными ценами и граммовкой);</p>
                <p>&nbsp;&nbsp;- корзина (добавление в корзину блюд с разными ценами и граммовкой, полная очистка корзины);</p>
                <p>&nbsp;&nbsp;- немножко для регистрации пользователя (он просто изначально заблокирован, только админ имеет снимать его блокировку, иначе скинул кому приложуху, он зарегался, и все поломал);</p>
                <p>&nbsp;&nbsp;- новости (типо сообщений от начальства);</p>
                <p>&nbsp;&nbsp;- блокировка не доступного функционала (только разработчики видят всё в шторке слева);</p>
                <p>&nbsp;&nbsp;- ну и немного тестовых данных через миграции.</p>
                <p>&nbsp;</p>
                <p>Функционал в основном пока что делается чисто для официанта, ведь если делать все по порядку, то сначала оформляется заказ.</p>
                <p>&nbsp;</p>
                <p>С уважением, sparrko!</p>'
            ]);
        DB::table('msgs')->insert(
            [
                'text' => 'Тестовое второе сообщение...'
            ]);
    }


    public function down()
    {

    }
}
