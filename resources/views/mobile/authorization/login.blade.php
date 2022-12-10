@extends('mobile.default')

@section('title')Авторизация@endsection
@section('styles')

<style>
    .btnOrange {
        font-weight: bold;
        background-color: #FFA500;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 9pt 20pt;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    .btnTrans {
        font-weight: bold;
        border: 1.5pt solid #FFA500;
        background-color: white;
        border-radius: 5px;
        color: #FFA500;
        padding: 10px 20pt;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }


</style>

@endsection
@section('scripts')

<script>
    var idElemScroll;
    function showErrMsgValid(text, event, _idElemScroll) {
        event.preventDefault();
        $('#msg_validTitle').html(text);
        idElemScroll = _idElemScroll;
        openModal('#msg_valid');
    }

    $(function () {

        $("#form").submit(function( event ) {
            if ($("#login").val().length == 0) { showErrMsgValid("Заполните поле <Логин>", event, "#name"); }
            else if ($("#login").val().length < 6) { showErrMsgValid("Поле <Логин> не может быть короче 6 символов", event, "#name"); }

            else if ($("#password").val().length == 0) { showErrMsgValid("Заполните поле <Пароль>", event, "#password"); }
            else if ($("#password").val().length < 6) { showErrMsgValid("Поле <Пароль> не может быть короче 6 символов", event, "#password"); }
        });

    })

    $(document).ready(function() {
        setTimeout(function() {
            $('#errorMsg').css("opacity", "1").animate({
                opacity: 0
            }, 800);
         }, 5000);
    });
</script>

@endsection
@section('content')

    <form id="form" action="{{ route('loginMobile') }}" method="POST">
        @csrf
        <p>Логин:</p>
        <input class="input" width="100%" type="text" id="login" name="login"
            value="{{old('login')}}">
        <p>Пароль:</p>
        <input class="input" width="100%" type="password" id="password" name="password">
        <p style="text-align: center; margin-top: 20pt;">
            <a href={{route('registerMobile')}}><input type="button" class="btnTrans" value="Регистрация"></a>
            <button class="btnOrange" type="submit" style="margin-left: 2pt;">Войти</button>
        </p>


        @if ($errors->any())
            <center><p id="errorMsg" style="margin: 0 10px; color: red;">{{ $errors->first() }}</p></center>
        @endif

    </form>

@endsection

@section('post-body')

    {{-- Окно указания ошибки валидации --}}
    <modalmsg id="msg_valid" title="Ошибка валидации">
        <p id="msg_validTitle"></p>

        <button class="btnOrange" onclick="
            closeModal(this);
            $('#content').animate({
                scrollTop: $(idElemScroll).offset().top
            }, 500);

            $(idElemScroll).animate({
                backgroundColor: '#ff6666'
            }, 500, function () {
            $(idElemScroll).animate({
                backgroundColor: '#ffffff'
            }, 500)});


            ">Ок</button></a>
    </modalmsg>

@endsection
