<div class="dishes-cards">

@foreach ($types as $type)

    @if($type->archived_at == null)
    <a class="card" href="{{ route('dishesMobile', ['id' => $type->id])}}">
        <div></div>
        @if ($type->img != null)
            <img src="{{ $type->img }}" alt="{{ $type->name }}">
        @else
            <img src="{{ asset('img/mobile/lostImage.png') }}" alt="{{ $type->name }}">
        @endif
        <p>{{ $type->name }}</p>
    </a>
    @endif

@endforeach

</div>

