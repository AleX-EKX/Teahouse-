<?php

return [

    'required' => 'Поле ":attribute" обязательно для ввода.',

    'attributes' => [
        // Register and login
        'name' => 'Имя',
        'surname' => 'Фамилия',
        'patr' => 'Отчество',
        'login' => 'Логин',
        'password' => 'Пароль',
        'phone' => 'Номер телефона',
    ],
    'min' => [
        'string' => 'Поле :attribute не может быть менее :min символов.',
    ],
];
