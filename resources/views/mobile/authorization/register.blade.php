@extends('mobile.default')

@section('title')Регистрация@endsection
@section('styles')


@endsection
@section('scripts')

<script src="{{asset('/js/basket.js')}}"></script>
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
            if ($("#name").val().length == 0) { showErrMsgValid("Заполните поле <Имя>", event, "#name"); }
            else if ($("#name").val().length < 2) { showErrMsgValid("Поле <Имя> не может быть короче 2 символов", event, "#name"); }

            else if ($("#surname").val().length == 0) { showErrMsgValid("Заполните поле <Фамилия>", event, "#surname"); }
            else if ($("#surname").val().length < 3) { showErrMsgValid("Поле <Фамилия> не может быть короче 3 символов", event, "#surname"); }

            else if ($("#patr").val().length == 0) { showErrMsgValid("Заполните поле <Отчество>", event, "#patr"); }
            else if ($("#patr").val().length < 4) { showErrMsgValid("Поле <Отчество> не может быть короче 4 символов", event, "#patr"); }

            else if ($("#dateborn").val().length == 0) { showErrMsgValid("Заполните поле <Дата рождения>", event, "#dateborn"); }

            else if ($("#phone").val().length == 0) { showErrMsgValid("Заполните поле <Номер телефона>", event, "#phone"); }
            else if ($("#phone").val().length < 11) { showErrMsgValid("Поле <Номер телефона> не может быть короче 11 символов", event, "#phone"); }

            else if ($("#login").val().length == 0) { showErrMsgValid("Заполните поле <Логин>", event, "#login"); }
            else if ($("#login").val().length < 6) { showErrMsgValid("Поле <Логин> не может быть короче 6 символов", event, "#login"); }

            else if ($("#password").val().length == 0) { showErrMsgValid("Заполните поле <Пароль>", event, "#password"); }
            else if ($("#password").val().length < 6) { showErrMsgValid("Поле <Пароль> не может быть короче 6 символов", event, "#password"); }

            else if ($("#password").val() !== $("#password2").val()) { showErrMsgValid("Пароли не совпадают", event, "#password"); }
        });

    })
</script>

@endsection
@section('content')

<form id="form" action="{{route('registerMobile')}}" method="POST">
    @csrf
    <p>Имя:</p>
    <input id="name" class="input" width="100%" type="text" name="name"
        value="{{old('name')}}">
    <p>Фамилия:</p>
    <input id="surname" class="input" width="100%" type="text" name="surname" value="{{old('surname')}}">
    <p>Отчество:</p>
    <input id="patr" class="input" width="100%" type="text" name="patr" value="{{old('patr')}}">
    <p>Дата рождения:</p>
    <input id="dateborn" class="input" width="100%" type="date" name="dateborn" value="{{old('dateborn')}}">
    <p>Номер телефона:</p>
    <input id="phone" class="input" width="100%" type="text" name="phone" value="{{old('phone')}}">
    <hr>
    <p>Логин:</p>
    <input id="login" class="input" width="100%" type="text" name="login" value="{{old('login')}}">
    <p>Пароль:</p>
    <input id="password" class="input" width="100%" type="password" name="password">
    <p>Еще раз пароль:</p>
    <input id="password2" class="input" width="100%" type="password" name="password2">

    <p style="text-align: center; margin-top: 20pt;">
        <a href="login"><input type="button" class="btnTrans" value="Назад"></a>
        <button class="btnOrange" type="submit" style="margin-left: 2pt;">Продолжить</button>
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
