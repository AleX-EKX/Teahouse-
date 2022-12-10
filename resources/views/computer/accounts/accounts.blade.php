@extends('computer.default')
@section('title')Сотрудники@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contextMenu.css') }}" />
@endsection

@section('scripts')
    <script>
        var focusId = 0;
        // UI
        function changeRoleMsg(idUser, roleNow) {
            focusId = idUser;
            $('#selectRole').val(roleNow);
            openModal('#msg_selectRole');
        }
        // Ajax
        function changeRoleAjax(idUser, roleNew) {
            $.ajax({
                url : '{{ route("changeAccountRoleAjax") }}',
                data: {'_token' : '{{ csrf_token() }}', 'id': idUser, 'role': roleNew},
                type: 'POST',
                async: false,
            }).done(function (Response) {
                dynamicallUpdate('#dc-accounts');
            })
            .fail(function (Response) {
                var data = JSON.parse(Response.responseText);
                $('#error_msg').html(data.message);
                openModal('#msg_error');
            });
        }

    </script>
    <script src="{{asset('/js/contextMenu.js')}}"></script>
@endsection

@section('content')
    <div class="head">
        <div>
            <h3>Список сотрудников</h3>
        </div>
        <div>
            <div>
                <a href="{{ route('mainComp') }}"><button class="btnOrange">Главное меню</button></a>
            </div>
        </div>
    </div>
    <div style="margin-right: 10pt; margin-left: 10pt">
        <filterplace id="dc-accounts">
            <fpcell>
                <p>ФИО сотрудника:</p>
                <input name="fullName" type="text" class="input">
            </fpcell>
            <fpcell>
                <p>Роль сотрудника:</p>
                <select name="role" class="select">
                    <option value="">любая</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role[0] }}">{{ $role[1] }}</option>
                    @endforeach
                </select>
            </fpcell>
            <fpsubmit>
                <button type='filter' class="btnOrange">Поиск</button>
                <button type='reset' class="btnTrans">Сброс</button>
            </fpsubmit>
        </filterplace>
    </div>
    <dynamicall id="dc-accounts" mode="computer" href="{{ route('accountsCompAjax') }}">

        {{-- content --}}

    </dynamicall>

    @include('computer.footer')

@endsection

@section('post-body')

    {{-- Окно выбора роли --}}
    <modalmsg id="msg_selectRole" title="Изменить роль">
        <p>Выберите роль</p>

        <select class="select" id="selectRole" style="width: 90%">
        @foreach ($roles as $role)
            <option value="{{ $role[0] }}">{{ $role[1] }}</option>
        @endforeach
        </select>

        <button class="btnOrange" onclick='changeRoleAjax(focusId, $("#selectRole").val()); closeModal(this)'>Изменить</button>
        <button class="btnOrange" onclick='closeModal(this)'>Отмена</button></a>
    </modalmsg>

    {{-- Окно ошибки --}}
    <modalmsg id="msg_error" title="Ошибка">
        <p style="text-align: justify; word-wrap: break-word;" id="error_msg"></p>
        <button class="btnOrange" onclick='closeModal(this)'>Закрыть</button></a>
    </modalmsg>

@endsection
