@extends('computer.default')
@section('title')Блюда@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contextMenu.css') }}" />
@endsection

@section('scripts')
    <script>

    </script>
    <script src="{{asset('/js/contextMenu.js')}}"></script>
@endsection

@section('content')
    <div class="head">
        <div>
            <h3>Блюда</h3>
        </div>
        <div>
            <div>
                <a href="{{ route('dishesCompEdit') }}"><button class="btnTrans">Добавить</button></a>
                <a href="{{ route('mainComp') }}"><button class="btnOrange">Главное меню</button></a>
            </div>
        </div>
    </div>
    <div style="margin-right: 10pt; margin-left: 10pt">
        <filterplace id="dc-dishes">
            <fpcell>
                <p>Название:</p>
                <input name="name" type="text" class="input">
            </fpcell>
            <fpcell>
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
            </fpcell>
            <fpsubmit>
                <button id="filterButton" type='filter' class="btnOrange">Поиск</button>
                <button type='reset' class="btnTrans">Сброс</button>
            </fpsubmit>
        </filterplace>
    </div>
    <dynamicall
        id="dc-dishes"
        mode="computer"
        href="{{ route('dishesCompAjax') }}"
        send="{{ $filterSend }}">

        {{-- content --}}

    </dynamicall>

    @include('computer.footer')

@endsection

@section('post-body')
@endsection
