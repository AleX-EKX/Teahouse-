<table class="table">
    <tr class="theadtable">
        <th></th>
        <th>Наименовани расхода</th>
        <th>Расход</th>
        
    </tr>
    @foreach ($expenses as $expen)
    <tr>
        
        <td>{{ $expen->name }}</td>
        <td>{{ $expen->price }}</td>
        
    </tr>
    @endforeach
</table>
<p class="sumTable">Всего: {{ count($expenses) }}</p>
