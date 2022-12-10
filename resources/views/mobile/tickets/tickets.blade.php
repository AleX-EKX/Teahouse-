@extends('mobile.default')

@section('title')Заявки@endsection
@section('styles')

<style>

</style>

@endsection
@section('scripts')
    <script src="{{asset('/js/basket.js')}}"></script>
    <script>

    </script>
@endsection
@section('content')

    <script>
        $(function () {
            var sending = getJsonBasket();

            $("#content").html("<dynamicall href='{{ route('ticketsAjaxMobile') }}' send='" + sending + "'></dynamicall>");
        });
    </script>



@endsection
