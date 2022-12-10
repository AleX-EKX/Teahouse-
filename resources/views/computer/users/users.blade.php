@extends('computer.default_authorization')

@section('title')Главная@endsection
@section('styles')

   

@endsection
@section('scripts')

@endsection
@section('content')

    <center>
        <h1>Пользователи</h1>
        <!-- <p>Функционал доступный вам: </p>
        <a href="{{ url('mobilePartApp/logout') }}">Выйти</a> -->
        
    </center>


    

    <h1>Пользователи</h1>
    @foreach($data as $el)
    <div class="blockusers">
    <h3>Имя: {{ $el->name }}</h3>
    <p> Телефон: {{ $el->phone }}</p>
    <p>Логин: {{ $el->login }}</p>
    <br>
    <a href="{{ route('updateusers', $el->id) }}" class="btn1">Редактировать</a><br>
    <br><br><a href="{{ route('delusers', $el->id) }}" class="btn1">Удалить</a>
</div>
    @endforeach


    


    @endsection
       
     







