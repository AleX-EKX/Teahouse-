@extends('computer.default')
@section('title'){{ isset($dish) ? "Редактирование" : "Создание нового" }} блюда@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contextMenu.css') }}" />
@endsection

@section('scripts')
    <script>
        var numName = 0;
        function addPO() {
            $('#priceOptions').append(
                "<p id='po[" + numName + "]'><input style='width:100px' class='input' name='price[" + numName + "]' type='text'><input style='width:100px' class='input' name='mass[" + numName + "]' type='text'><button type='button' onclick='$(this).parent().remove()'>Del</button></p>"
                );

            numName++;
        }
    </script>
    <script src="{{asset('/js/imgLoader.js')}}"></script>
    <script src="{{asset('/css/fposterPriceOptions.js')}}"></script>
@endsection

@section('content')
    <div class="head">
        <div>
            <h3>{{ isset($dish) ? "Редактирование" : "Создание нового" }} блюда</h3>
        </div>
        <div>
            <div>
                <a href="{{ route('dishesComp') }}"><button class="btnTrans">Вернуться назад</button></a>
            </div>
        </div>
    </div>

    <div class="formEdit">
        <form method="post" action="{{ isset($dish) ? route('dishesCompEditPost', ['dish' => $dish]) : route('dishesCompEditPost') }}">
            @csrf
            <p>Название:</p>
            <input name="name" type="text" class="input" value="{{ isset($dish) ? $dish->name : '' }}">

            <p>Описание:</p>
            <textarea name="desc" type="text" class="input" value="{{ isset($dish) ? $dish->desc : '' }}"></textarea>

            <p>Категория:</p>
            <select name="type" class="select">
                <option value="">любая</option>
                @foreach ($types as $type)
                    @if(isset($selectedType) && $type == $selectedType)
                        <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                    @else
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endif
                @endforeach
            </select>

            <p>Изображение:</p>
            <img-loader src="{{ isset($dish) ? $dish->img : '' }}" name="image" mwidth="250px" mweight="512000"></img-loader>

            @if ($errors->any())
                <center style="margin: 20pt 0pt"><p id="errorMsg" style="margin: 0 10px; color: red;">{{ $errors->first() }}</p></center>
            @endif

            <p>Расценки:</p>
            <div id="priceOptions">
            </div>
            <button type="button" onclick="addPO()">Add</button>

            <button type="submit" class="btnOrange">{{ isset($dish) ? "Сохранить изменения" : "Создать" }}</button>
        </form>
    </div>



    @include('computer.footer')

@endsection

@section('post-body')
@endsection
