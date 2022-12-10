@php
    $sum = 0;
@endphp

@if (isset($data))
    <div id="basket-list">
    @foreach ($data as $row)
    <div>
        <table class="basket-row">
            <tr class="first-row">
                <td class="first-column">{{ $row[0]->name }}</td>
                <td class="second-column">x{{ $row[3] }}</td>
                <td class="third-column" rowspan="2" width="36px">
                    <img style="height: 35px" src="{{asset('/img/mobile/delete.png')}}"
                    onclick="
                        if (!deleteFromBasket({{ $row[0]->id }}, {{ $row[1] }}, '{{ $row[2] }}')){
                            // Animation
                            if ($(this).attr('deleted') != 'deleted'){
                                var thisCart = $(this).parent().parent().parent().parent();
                                $(this).attr('deleted', 'deleted');
                                thisCart.stop();
                                thisCart.css({'position' : 'relative',  'opacity' : '1'});
                                thisCart.animate({
                                    'left' : '-10%',
                                    opacity: '0',
                                }, 600 , function() {
                                    var oldHeight = thisCart.css('height');
                                    var oldMarginBottom = thisCart.css('margin-bottom');
                                    var par = thisCart.parent();
                                    thisCart.parent().html('<div style=\'height:' + (parseFloat(oldHeight.replace('px', '')) + parseFloat(oldMarginBottom.replace('px', ''))) + '\'></div>');
                                    par.children().eq(0).animate({
                                        'height' : '0px',
                                    }, 600 , function() {
                                        $(this).remove();
                                    });
                                });
                                newSumPrice(String(sumPrice - {{ $row[1] }}));
                            }
                        }
                        else {
                            var oldString = $(this).parent().parent().children().eq(1).html();
                            var newInt = parseInt(oldString.substr(1, oldString.length));
                            $(this).parent().parent().children().eq(1).html('x' + String(newInt - 1));

                            // Animation
                            var thisCart = $(this).parent().parent().parent().parent();
                            var oldColor = $( this ).css( 'background' );
                            thisCart.stop();
                            thisCart.css({'background' : '#ff6666'});
                            thisCart.animate({
                                backgroundColor: oldColor,
                            }, 700 );
                            newSumPrice(String(sumPrice - {{ $row[1] }}));
                        }
                    ">
                </td>
            </tr>
            <tr class="second-row">
                <td class="first-column">({{ $row[2] }})</td>
                <td class="second-column">{{ $row[1] }} рублей</td>
            </tr>
            @php
                $sum = $sum + ($row[1] * $row[3]);
            @endphp
        </table>
    </div>
    @endforeach


    <p style="margin: 10pt 0;">
        <span>Суммарная стоимость:<span>
        <span style="float: right"><span id="sumPrice">{{ $sum }}</span> рублей<span>
    </p>

    <script>
        var sumPrice = {{ $sum }};
    </script>

    <center>
        <button type="button" id="btn-clear-basket" onclick="openModal('#msg_clearBasket')" class="btnTrans">Очистить корзину</button>
        <button type="button" class="btnOrange" onclick="openModal('#msg_howManyPeople')">Сохранить заявку</button>
    </center>

    </div>
@else
    <p class='basket-msg'>Корзина пустая</p>
@endif
