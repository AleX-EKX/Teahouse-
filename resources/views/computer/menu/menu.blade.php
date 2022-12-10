@extends('computer.default_authorization')

@section('title')Меню@endsection
@section('styles')

   


@endsection
@section('scripts')

@endsection
@section('content')

    <center>
        <h1>Админ</h1>
        <!-- <p>Функционал доступный вам: </p>
        <a href="{{ url('mobilePartApp/logout') }}">Выйти</a> -->
        
    </center>


    

    <h1>Меню</h1>
    @foreach($Menu as $el)
    <div class="blockusers">
    <h3>Блюдо: {{ $el->name }}</h3>
    <img  width="250"  height="200">{{ $el->img }} </img>
    <p>Категория: {{ $el->idMenuType }}</p>
    <p>Цена: {{ $el->price }}</p>
    <p>Описание: {{ $el->desc }}</p>
    <br>
    <a href="{{ route('updatemenu', $el->id) }}" class="btn1">Редактировать</a><br>
    <br><br><a href="{{ route('delmenu', $el->id) }}" class="btn1">Удалить</a>
</div>
    @endforeach


    


    @endsection
       
     







