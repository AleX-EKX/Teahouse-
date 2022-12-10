@extends('mobile.default')

@section('title')Настройки@endsection
@section('styles')

<style>
.blockusers{
    padding: 30px 0;
    margin: 10px 10px 10px 25px;
     float: left;
    position: relative;
    width: 150px;
    box-shadow: 0em 0.4em 5px rgba(122,122,122,0.5);
    border-radius: 10px
}
</style>

@endsection
@section('scripts')
    <script src="{{asset('/js/basket.js')}}"></script>
    <script>

    </script>
@endsection
@section('content')

<div class="content-sub">
    <p>
        <b>Логин:</b>
        {{ Auth::user()->login }}.
    </p>
    <p>Имя: {{ Auth::user()->name }}.</p>
    <p>Фамилия: {{ Auth::user()->surname }}.</p>
    <p>Отчество: {{ Auth::user()->patr }}.</p>
    <p>Телефон: {{ Auth::user()->phone }}.</p>
    <p>Ваша роль: {{ Auth::user()->getRuRole() }}.</p>
    <hr>
    <p>Json корзины: <span id="jsonBasketNow"></span></p>
    <script>
        var sending = getJsonBasket();
        $('#jsonBasketNow').html(sending);
    </script>
    <button class="btnOrange" onclick="clearBasket()">Очистить корзину</button>
</div>

<!-- <script>
        var sending = getJsonBasket();
        $('#jsonBasketNow').html(JSON.stringify(sending));
    </script>
    <button class="btnOrange" onclick="clearBasket()">Очистить корзину</button>
</div> -->

<p>Это должны видеть повара,Тут типо названия блюда,кол и официант наверное должно быть,
     пока так по айдишникам стоят, еще наверное нужно кнопку удалить добавить именно у поваров: <span id="cena"></span></p>
<script>
const renderItem = ({id, price, desc, count}) => ` <div class="blockusers">

   <span> ${id}</span><br>
  <span >${price}</span><br>
  <span >${desc}</span><br>
  <span >${count}</span><br>
</div>`
const items = getnormal();
const html = `<div>${items.map(renderItem).join('')}</div>`
$('#cena').html(html);
</script>

@endsection
