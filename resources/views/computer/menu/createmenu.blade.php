@extends('computer.default_authorization')

@section('title')Добавление блюда@endsection
@section('styles')

    

@endsection
@section('scripts')

@endsection
@section('content')

    <center>
        <h1>Добавление нового блюда</h1>
        <!-- <p>Функционал доступный вам: </p>
        <a href="{{ url('mobilePartApp/logout') }}">Выйти</a> -->
        
    </center>
       
    
    <form class="form" action="{{ route ('processcreatemenu') }}" method="post">
    @csrf
    <div class="#">
    <label for="name">Название блюда</label>
    <input class="input"  type="text" name="name" placeholder="Введите название блюда" id="name">


    <label for="img">Загрузите фото блюда</label>
    <input class="input" type="file" name="img" placeholder="Введите фото блюда" id="img">


    <label for="idMenuType">Введите категорию блюда(1-Первое,2-Второе,3-Мангал,4-Гарнир,5-Салат,6-Соусы, 7-Выпечка,8-Напитки, 9-Десерты, 10-Фирменные)</label>
    <input class="input" type="number" name="idMenuType" placeholder="Введите категорию блюда" id="idMenuType">


    <label for="price">Цена блюда</label>
    <input class="input" type="number" name="price" placeholder="Введите цену блюда" id="price">


    <label for="desc">Описание блюда</label>
    <input class="input" type="text" name="desc" placeholder="Описание блюда" id="desc">

    </div>
    <button type="submit" class="btn1">Добавить</button>
    <br><br><br>

</form>

    


    @endsection
       
     







