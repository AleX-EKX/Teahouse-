@extends('computer.default')
@section('title'){{ isset($type) ? "Редактирование" : "Создание новой" }} категории блюд@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contextMenu.css') }}" />
@endsection

@section('scripts')
    <script>

    </script>
    <script src="{{asset('/js/imgLoader.js')}}"></script>
@endsection

@section('content')
    <div class="head">
        <div>
            <h3>{{ isset($type) ? "Редактирование" : "Создание новой" }} категории блюд</h3>
        </div>
        <div>
            <div>
                <a href="{{ route('typesComp') }}"><button class="btnTrans">Вернуться назад</button></a>
            </div>
        </div>
    </div>

    <div class="formEdit">
        <form method="post" action="{{ isset($type) ? route('typesCompEditPost', ['type' => $type]) : route('typesCompEditPost') }}">
            @csrf
            <p>Название:</p>
            <input name="name" type="text" class="input" value="{{ isset($type) ? $type->name : '' }}">

            <p>Изображение:</p>
            <img-loader src="{{ isset($type) ? $type->img : '' }}" name="image" mwidth="250px" mweight="512000"></img-loader>

            @if ($errors->any())
                <center style="margin: 20pt 0pt"><p id="errorMsg" style="margin: 0 10px; color: red;">{{ $errors->first() }}</p></center>
            @endif

            <button type="submit" class="btnOrange">{{ isset($type) ? "Сохранить изменения" : "Создать" }}</button>
        </form>
    </div>



    @include('computer.footer')

@endsection

@section('post-body')
@endsection
