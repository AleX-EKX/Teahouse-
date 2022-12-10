@extends('computer.default')
@section('title')Аналитика@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contextMenu.css') }}" />

@endsection

@section('scripts')
    <script>
        
    </script>
@endsection

@section('content')


<form class="form" action="{{ route ('processupdateexpenses',$expenses->id) }}" method="post">
    @csrf
    <div class="#">
    <label for="name">Название расхода</label>
    <input class="input"  type="text" name="name" value="{{$expenses->name}}" placeholder="Введите название блюда" id="name">

   
    <label for="price">Цена блюда</label>
    <input class="input" type="number" name="price" value="{{$expenses->price}}" placeholder="Введите цену блюда" id="price">

    
    </div>
    <button type="submit" class="btn1">Изменить</button>
    <br><br><br>

</form>










@include('computer.footer')

@endsection