@extends('mobile.default')

@section('title')Категории блюд@endsection
@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/dishes.css') }}" />

@endsection
@section('scripts')

@endsection
@section('content')

    <dynamicall href="{{ route('typesCardMobile') }}">

    </dynamicall>

@endsection
