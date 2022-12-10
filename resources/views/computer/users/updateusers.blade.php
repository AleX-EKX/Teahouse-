@extends('computer.default_authorization')

@section('title')Редактирование пользователя@endsection
@section('styles')

  



@endsection
@section('scripts')

@endsection
@section('content')

    <center>
        <h1>Редактирование пользователя</h1>
        <!-- <p>Функционал доступный вам: </p>
        <a href="{{ url('mobilePartApp/logout') }}">Выйти</a> -->
        
    </center>
       
    
    <form class="form" action="{{ route ('processupdateusers', $data->id) }}" method="post">
    @csrf
    <div class="#">
    

    <label for="type"> Выберите Роль</label>
    <input class="input" type="radio" name="type" value="waiter" value="{{$data->waiter}}" id="type">Официант
    <input class="input" type="radio" name="type" value="admin" value="{{$data->admin}}" id="type">Админ
    <input class="input" type="radio" name="type" value="cook" value="{{$data->cook}}" id="type">Повар
    <br><br>

    <label for="type"> Выберите Бан</label>
    <input class="input" type="radio" name="block" value="new" value="{{$data->new}}" id="type">Новый
    <input class="input" type="radio" name="block" value="no" value="{{$data->no}}" id="type">Нет
    <input class="input" type="radio" name="block" value="ban" value="{{$data->ban}}" id="type">Забанить

    </div>
    <br><br>
    <button type="submit" class="btn1">Редактировать</button>
    <br><br><br>

</form>

    


    @endsection
       
     







