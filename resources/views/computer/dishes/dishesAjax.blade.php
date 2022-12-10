<table class="table">
    <tr>
        <th></th>
        <th>Название</th>
    </tr>
    @foreach ($dishes as $dish)
    <tr>
        <td width="1px">
            <context>
                <a>Редактировать</a>
                <a>Архивировать</a>
            </context>
        </td>
        <td width="180px">{{ $dish->name }}</td>
    </tr>
    @endforeach
</table>
<p class="sumTable">Всего: {{ count($dishes) }}</p>
