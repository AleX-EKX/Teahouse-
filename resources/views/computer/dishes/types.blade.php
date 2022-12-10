@extends('computer.default')
@section('title')Категории блюд@endsection

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
            <h3>Категории блюд</h3>
        </div>
        <div>
            <div>
                <a href="{{ route('typesCompEdit') }}"><button class="btnTrans">Добавить</button></a>
                <a href="{{ route('mainComp') }}"><button class="btnOrange">Главное меню</button></a>
            </div>
        </div>
    </div>
    <div style="margin-right: 10pt; margin-left: 10pt">
        <filterplace id="dc-types">
            <fpcell>
                <p>Название:</p>
                <input name="name" type="text" class="input">
            </fpcell>
            <fpcell>
                <p>По статусу записи:</p>
                <select name="status" class="select">
                    <option value="">любой</option>
                    <option value="archived">архивированные</option>
                    <option value="not_archived">не архивированные</option>
                </select>
            </fpcell>
            <fpsubmit>
                <button type='filter' class="btnOrange">Поиск</button>
                <button type='reset' class="btnTrans">Сброс</button>
            </fpsubmit>
        </filterplace>
    </div>
    <dynamicall id="dc-types" mode="computer" href="{{ route('typesCompAjax') }}">

        {{-- content --}}

    </dynamicall>

    @include('computer.footer')

@endsection

@section('post-body')

@endsection
