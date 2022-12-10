@extends('computer.default')

@section('title')Главное меню@endsection

@section('content')
<p>Главное меню</p>
<a href="{{ route('accountsComp') }}"><button class="btnTrans">Сотрудники</button></a>
<a href="{{ route('typesComp') }}"><button class="btnTrans">Категории блюд</button></a>
<a href="{{ route('dishesComp') }}"><button class="btnTrans">Блюда</button></a>
<a href=""><button class="btnTrans">Новости</button></a>
<a href="{{route('expenses')}}"><button class="btnTrans">Аналитика</button></a>
<hr>
<a href="{{ url('computerPartApp/logout') }}"><button class="btnTrans">Выход из аккаунта</button></a>
@endsection
