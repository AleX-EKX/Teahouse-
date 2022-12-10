@if (isset($tickets))
    @foreach ($tickets as $ticket)
    <div style="background-color: rgb(230, 230, 230); padding: 10px; margin-bottom: 10px">
        <p>Заявка №{{ $ticket->id }}</p>
        <p>Дата создания: {{ $ticket->dateCreate }}</p>
        <p>Статус:
            @switch($ticket->status)
                @case('new')
                    Новая
                    @break
                @case('in_work')
                    В работе
                    @break
                @case('ready')
                    Готова
                    @break
            @endswitch
        </p>
        <p>Создано: {{ App\User::find($ticket->idWaiter)->getFullName() }}</p>
        <p>Меню:</p>
        <div>
            <button type="button" onclick="
                if ($(this).parent().children().eq(1).attr('class') == 'dt_closed'){
                    $(this).parent().children().eq(1).css('display', 'block');
                    $(this).parent().children().eq(1).attr('class', 'dt_opened');
                    $(this).text('Скрыть');
                }
                else{
                    $(this).parent().children().eq(1).css('display', 'none');
                    $(this).parent().children().eq(1).attr('class', 'dt_closed');
                    $(this).text('Показать');
                }
                ">Показать</button>
            <div class="dt_closed" style="display: none">
                @foreach ($ticket->basket as $row)
                    <p>{{ App\DishModel::find($row[0])->name }}, {{ $row[1] }}р, {{ $row[2] }}, x{{ $row[3] }}</p>
                    <p></p>
                @endforeach
            </div>
        </div>
        <a href="{{ route('ticketsCancelMobile', $ticket->id) }}"><button type="button">Отменить</button></a>
        @if ($ticket->status == 'ready')
            <a href="{{ route('ticketsCancelMobile', $ticket->id) }}"><button type="button">Отменить</button></a>
        @endif
    </div>
    @endforeach
@endif
