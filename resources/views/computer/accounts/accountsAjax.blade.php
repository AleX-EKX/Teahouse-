
<table class="table">
    <tr class="theadtable">
        <th></th>
        <th>ФИО</th>
        <th>Роль</th>
        <th>Телефон</th>
        <th>Дата рождения</th>
    </tr>
    @foreach ($accounts as $account)
    <tr>
        <td>
            @if($account->id != Auth::user()->id)
            <context>
                <a onclick="changeRoleMsg({{ $account->id }}, '{{ $account->type }}')">Изменить роль</a>
            </context>
            @endif
        </td>
        <td>{{ $account->getLongFullName() }}</td>
        <td><a onclick="changeRoleMsg({{ $account->id }}, '{{ $account->type }})'">{{ $account->getRuRole() }}</a></td>
        <td>{{ $account->phone }}</td>
        <td>{{ $account->dateborn }}</td>
    </tr>
    @endforeach
</table>
<p class="sumTable">Всего: {{ count($accounts) }}</p>

