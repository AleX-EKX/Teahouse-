@extends('mobile.default')

@section('title'){{ $typeModel->name }}@endsection
@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/dishes.css') }}" />

@endsection
@section('scripts')
<script src="{{asset('/js/basket.js')}}"></script>
<script>

</script>
@endsection
@section('content')

    <dynamicall href="{{ route('dishesCardMobile', ['id' => $typeModel->id]) }}">

    </dynamicall>

@endsection

