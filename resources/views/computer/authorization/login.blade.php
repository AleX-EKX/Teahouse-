@extends('computer.default')

@section('title')Авторизация@endsection
@section('styles')

@endsection
@section('scripts')

@endsection
@section('content')
    <form class="form" action="{{ route('loginComp') }}" method="POST">
        @csrf
        <h3>Вход в личный кабинет</h3>
        <p>Доступ к данному ресурсу для незарегестрированных пользователей а так же не администраторов закрыт!</p>
        <label>Логин</label>
        <input id="login" name="login" type="text">
        <label>Пароль</label>
        <input id="password" name="password" type="password">
        <button type="submit">Войти</button>
        @if ($errors->any())
            <center><p id="errorMsg" style="margin: 0 10px; color: red;">{{ $errors->first() }}</p></center>
        @endif
    </form>
@endsection
