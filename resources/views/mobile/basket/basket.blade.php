@extends('mobile.default')

@section('title')Корзина@endsection
@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/basket.css') }}" />

@endsection
@section('scripts')
    <script src="{{asset('/js/basket.js')}}"></script>
    <script>
        var $countPeoples;
        var $numTable;

        function submitAll(){
            $('#fr_send_basket').val(getJsonBasket());
            $('#fr_send_countPeoples').val($countPeoples);
            $('#fr_send_numTable').val($numTable);

            clearBasket();
            $('#fr_send').submit();
        }
    </script>
@endsection
@section('post-body')

    {{-- Окно "Вы уверены что хотите очистить корзину?" --}}
    <modalmsg id="msg_clearBasket" title="Очистить корзину">
        <p>Вы уверены что хотите очистить корзину?</p>

        <button class="btnOrange" onclick='clearBasket();closeModal(this)'>Да</button>
        <button class="btnOrange" onclick='closeModal(this)'>Нет</button></a>
    </modalmsg>
    {{-- Окно "Укажите кол-во гостей" --}}
    <modalmsg id="msg_howManyPeople" title="Сохранение заявки">
        <p>Укажите кол-во гостей</p>

        <input id="data_1" class="input" width="100%" type="number">
        <button class="btnOrange" onclick="$countPeoples=$('#data_1').val();closeModal(this);openModal('#msg_tableNum')">Продолжить</button>
        <button class="btnOrange" onclick='closeModal(this)'>Отмена</button></a>
    </modalmsg>
    {{-- Окно "Укажите номер стола" --}}
    <modalmsg id="msg_tableNum" title="Сохранение заявки">
        <p>Укажите стол</p>

        <input id="data_2" class="input" width="100%">
        <button class="btnOrange" onclick="$numTable=$('#data_2').val(); closeModal(this); submitAll();">Сохранить</button>
        <button class="btnOrange" onclick='closeModal(this)'>Отмена</button></a>
    </modalmsg>

@endsection
@section('content')

<form style="display: none;" action="{{ route('ticketsCreateMobile') }}" method="post" id="fr_send">
    @csrf
    <input style="display: none;" name="basket" id="fr_send_basket">
    <input style="display: none;" name="countPeoples" id="fr_send_countPeoples">
    <input style="display: none;" name="numTable" id="fr_send_numTable">
</form>

<div id="forForm">
</div>

<script>
    $(function () {
        var sending = getJsonBasket();
        $("#forForm").html("<dynamicall href='{{ route('basketAjaxMobile') }}' send='" + sending + "'></dynamicall>");


    });
</script>

@endsection
@section('post-body')

@endsection


