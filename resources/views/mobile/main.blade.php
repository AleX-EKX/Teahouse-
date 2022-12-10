@extends('mobile.default')

@section('title')Главная@endsection
@section('styles')

<style>

</style>

@endsection
@section('scripts')

<script type="text/javascript">
    $(function () {
        const d = new Date();
        let hour = d.getHours();
        var hello = "";
        if (hour < 6) hello = "Добрая ночь, ";
        else if (hour < 12) hello = "Доброе утро, ";
        else if (hour < 18) hello = "Добрый день, ";
        else if (hour < 24) hello = "Добрый вечер, ";
        document.getElementById('helloTitle').innerText = hello + "{{ Auth::user()->name }}!";
    })

</script>


@endsection
@section('content')

<div class="content-sub">
    <center>
        <b><p id="helloTitle" style="font-size: 20pt"></p></b>
        <p>Ваша роль: {{ Auth::user()->getRuRole() }}.</p>
    </center>
    <hr>
    <p>Новости: </p>
    @foreach ($msgs as $msg)
        <div class="msgs-card">
            <p style="margin-bottom: 5pt"><b>{{ $msg->created_at }}</b></p>
            <p>{!! $msg->text !!}</p>
        </div>
    @endforeach
</div>

@endsection
