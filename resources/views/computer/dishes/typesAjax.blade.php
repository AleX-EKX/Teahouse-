<script>
    function archiving(id) {
        $.get( "{{ route('typeCompArchiving', ['type' => '']) }}" + id, function() {
            dynamicallUpdate('#dc-types');
        });
    }
</script>
<table class="table">
    <tr>
        <th></th>
        <th>Название</th>
        <th>Кол-во блюд</th>
    </tr>
    @foreach ($types as $type)
    <tr>
        <td width="1px">
            <context>
                <a href="{{ route('typesCompEdit', ['type' => $type->id]) }}">Редактировать</a>
                <a href="{{ route('dishesComp', ['type' => $type->id]) }}">Просмотреть блюда</a>
                <a onclick="archiving({{ $type->id }})">{{ ($type->archived_at != null) ? "Разархировать" : "Архивировать" }}
                </a>
            </context>
        </td>
        <td width="180px">
            {{ $type->name }}
            @if($type->archived_at != null)
                <span style="color:red">(в архиве)</span>
            @endif
        </td>
        <td>{{ $type->dishes->count() }}</td>
    </tr>
    @endforeach
</table>
<p class="sumTable">Всего: {{ count($types) }}</p>
