@extends('computer.default')
@section('title')Аналитика@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contextMenu.css') }}" />

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

@section('content')
<div class="head">
        <div>
            <h3>Список сотрудников</h3>
        </div>
        <div>
            <div>
                <a href="{{ route('mainComp') }}"><button class="btnOrange">Главное меню</button></a>
            </div>
        </div>
    </div>
    <div style="margin-right: 10pt; margin-left: 10pt">
        <filterplace id="dc-accounts">
            <fpcell>
                <p>ФИО сотрудника:</p>
                <input name="fullName" type="text" class="input">
            </fpcell>
            
            <fpsubmit>
                <button type='filter' class="btnOrange">Поиск</button>
                <button type='reset' class="btnTrans">Сброс</button>
            </fpsubmit>
        </filterplace>
    </div>
    <dynamicall id="dc-accounts" mode="computer" href="{{ route('accountsCompAjax') }}">
    {{-- content --}}

</dynamicall>

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
        $("#forForm").html("<dynamicall href='{{ route('AnalyticsAjaxComputer') }}' send='" + sending + "'></dynamicall>");


    });
</script>


@include('computer.footer')

@endsection