@extends('computer.default')
@section('title')Аналитика@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contextMenu.css') }}" />

@endsection

@section('scripts')
    <script>
        const formatNumber = (x) => x.toString().replace(/\B(7<!\.\d*)(?=(\d{3})+(?!\d))/g, ' ');

const totalPriceWrapper = document.getElementById('total-price');

const getItemSubTotalPrice = (input) => Number(input.value) * Number(input.dataset.value)

const init = () => {
let totalCost = 0;
[...document.querySelectorAll('.basket__item')].forEach((basketItem) => {
    totalCost += getItemSubTotalPrice(basketItem.querySelector('.input'));
});
totalPriceWrapper.textContent = formatNumber(totalCost);
}
init();
    </script>
@endsection

@section('content')
<div class="head">
        <div>
            <h3>Список расходов</h3>
        </div>
        <div>
            <div>
                <a href="{{ route('mainComp') }}"><button class="btnOrange">Главное меню</button></a>
                <a href="{{ route('createexpenses') }}"><button class="btnOrange">добавить расход</button></a>
            </div>
        </div>
    </div>
    <div style="margin-right: 10pt; margin-left: 10pt">
        <filterplace id="dc-accounts">
            <fpcell>
                <p>Наименование расхода:</p>
                <input name="fullName" type="text" class="input">
            </fpcell>
            
            <fpsubmit>
                <button type='filter' class="btnOrange">Поиск</button>
                <button type='reset' class="btnTrans">Сброс</button>
            </fpsubmit>
        </filterplace>
    </div>
    <dynamicall id="dc-accounts" mode="computer" href="{{ route('expensesAjax') }}">
    {{-- content --}}

</dynamicall>
@foreach($expenses as $el)
@csrf
    <div class="blockusers">
    <h3>Наименование расхода:{{ $el->name }}</h3>
    <p>Стоимость: {{ $el->price }}</p>
    <br>
    <a href="{{ route('updateexpenses', $el->id) }}" class="btn1">Редактировать</a><br>
    <br><br><a href="{{ route('delexpenses', $el->id) }}" class="btn1">Удалить</a>
</div>
    @endforeach
    <table class="table" id="basket">
        <thead>
            <tr>
                <th>Название</th>
                <th class="">Стоимость</th>
                <th>Количество</th>
                <th class="">Подытог</th>
</tr>
</thead>
<tbody>
    <tr class="basket__item">
        <td class="">продукт 1</td>
        <td class="">1000</td>
        <td class="">
        <div class="input-group">
        <button type="button" class="btn">-</button>
        <input type="number" value="2" data-price="1000" class="form-control input" disabled/>
        <button type="button" class="btn">+</button>
        
    </div>
    </td>
    <td class="subtotal">2000 rub</td>
</tr>
<tr class="basket__item">
        <td class="">продукт 2</td>
        <td class="">2000</td>
        <td class="count">
        <div class="input-group">
        <button type="button" class="btn">-</button>
        <input type="number" value="5" data-price="2000" class="form-control input" disabled/>
        <button type="button" class="btn" onclick='expens(this)'>+</button>
        
    </div>
    </td>
    <td class="subtotal">10000 rub</td>
</tbody>
</table>
<div class="total-price">Итого: <span id="total-price"></span>руб.</div>

<script>
    
</script>






@include('computer.footer')

@endsection