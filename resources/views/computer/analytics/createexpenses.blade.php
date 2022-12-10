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

<form class="form" action="{{ route ('processcreateexpenses') }}" method="post">
    @csrf
    <div class="#">
    <label for="name">Наименование расхода</label>
    <input class="input"  type="text" name="name" placeholder="Введите наименование расхода" id="name">

    <label for="price">Расход</label>
    <input class="input" type="text" name="price" placeholder="Введите расход" id="price">

    </div>
    <button type="submit" class="btn1">Добавить</button>
    <br><br><br>

</form>




@include('computer.footer')

@endsection