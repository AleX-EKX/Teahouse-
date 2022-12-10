<div class="dishes-cards">

    @if($dishesList->count() !== 0)
        @foreach ($dishesList as $dish)

            <article class="card" href="#!">
                <div></div>
                @if ($dish->img != null)
                    <img src="{{ $dish->img }}" alt="{{ $dish->name }}">
                @else
                    <img src="{{ asset('img/mobile/lostImage.png') }}" alt="{{ $dish->name }}">
                @endif
                <p>{{ $dish->name }}</p>
                <p style="font-size: 10pt; color: rgb(120, 120, 120);">{{ $dish->desc }}</p>
                <div class="add-buttons-list">
                    @foreach ($dish->price as $priceRow)
                    <button type="button" class="btnOrange" onclick="
                        addToBasket({{ $dish->id }}, {{ $priceRow['price'] }}, '{{ $priceRow['mass'] }}');

                        var butWrap = $(this).parents('.add-buttons-list');
                        butWrap.append('<div class=\'animtocart\'></div>');
                        $('.animtocart').css({
                            'position' : 'absolute',
                            'background' : '#FFA500',
                            'border' : '1px solid #ee8300',
                            'width' :  '30pt',
                            'height' : '30pt',
                            'border-radius' : '100px',
                            'z-index' : '9999999999',
                            'left' : $(this).position().left + $('dynamicall').eq(0).scrollLeft(),
                            'top' : $(this).position().top + $('dynamicall').eq(0).scrollTop(),
                        });
                        var cart = $('.cart').offset();
                        $('.animtocart').animate({ top: $('dynamicall').eq(0).scrollTop() + 'px', left: $('dynamicall').eq(0).scrollLeft() + 'px', width: 0, height: 0 }, 1000, function(){
                            $(this).remove();
                        });
                    ">{{ $priceRow['price'] }}р ({{ $priceRow['mass'] }})</button>
                    @endforeach
                </div>
            </article>

        @endforeach
    @else
        <div class="no-cards">
            <p>В данной категории еще пока нет блюд.</p>
        </div>
    @endif

</div>
