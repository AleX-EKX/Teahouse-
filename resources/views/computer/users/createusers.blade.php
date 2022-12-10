@extends('computer.default_authorization')

@section('title')Главная@endsection
@section('styles')

  


@endsection
@section('scripts')

@endsection
@section('content')

    <center>
        <h1>Добавление нового пользователя</h1>
        <!-- <p>Функционал доступный вам: </p>
        <a href="{{ url('mobilePartApp/logout') }}">Выйти</a> -->
        
    </center>
       
    
    <form class="form" action="{{ route ('processcreateusers') }}" method="post">
    @csrf
    <div class="#">
    <label for="name">Введите имя</label>
    <input class="input"  type="text" name="name" placeholder="Введите имя" id="name">


    <label for="surname">Введите Фамилию</label>
    <input class="input" type="text" name="surname" placeholder="Введите Фамилию" id="surname">


    <label for="patr">Введите Отчество</label>
    <input class="input" type="text" name="patr" placeholder="Введите Отчество" id="patr">


    <label for="phone">Введите телефон</label>
    <input class="input" type="tel" name="phone" placeholder="Введите телефон" id="phone">


    <label for="dateborn">Введите Дату рождения</label>
    <input class="input" type="date" name="dateborn" placeholder="Введите Дату рождения" id="dateborn">


    <label for="login">Введите логин</label>
    <input class="input" type="text" name="login" placeholder="Введите логин" id="login">


    <label for="password">Введите Пароль</label>
    <input class="input" type="password" name="password" placeholder="Введите Пароль" id="password">


    <label for="type"> Выберите Роль</label>
    <input class="input" type="radio" name="type" value="waiter" id="type">Официант
    <input class="input" type="radio" name="type" value="admin" id="type">Админ
    <input class="input" type="radio" name="type" value="cook" id="type">Повар
    </div>
    <button type="submit" class="btn1">Добавить</button>
    <br><br><br>

</form>

    


    @endsection
       
     







