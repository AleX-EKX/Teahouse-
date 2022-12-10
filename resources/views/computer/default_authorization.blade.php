<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=10" />
        <title>Лаззат - @yield('title')</title>
       
            
            
            @yield('styles')
            
            <link rel="stylesheet" type="text/css" href="{{ asset('/css/default.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/modalMsg.css') }}" />


        <script src="{{asset('/js/include/jquery-3.6.0.js')}}"></script>
        <script src="{{asset('/js/menu.js')}}"></script>

            
       
        <script>
            var menuOpened = false;
            var menuAnimateProcess = false;
            var menuAnimateSpeed = 200;

            function toggleMenu(){
                if(!menuAnimateProcess){
                    menuAnimateProcess = true;
                    if (!menuOpened) {
                        $('#menu').css("left", "-100%").animate({
                            "left": "0%"
                        }, menuAnimateSpeed);

                        $('#menuButton').css("opacity", "1").animate({
                            opacity: 0
                        }, menuAnimateSpeed / 2, function() {
                            $("#menuButton").attr("src","{{asset('/img/mobile/menuClose.png')}}");
                            $('#menuButton').css("opacity", "0").animate({
                                opacity: 1
                            }, menuAnimateSpeed / 2);
                            menuOpened = true;
                            menuAnimateProcess = false;
                        });
                    }
                    else if (menuOpened) {
                        $('#menu').css("left", "0%").animate({
                            "left": "-100%"
                        }, menuAnimateSpeed);

                        $('#menuButton').css("opacity", "1").animate({
                            opacity: 0
                        }, menuAnimateSpeed / 2, function() {
                            $("#menuButton").attr("src","{{asset('/img/mobile/menu.png')}}");
                            $('#menuButton').css("opacity", "0").animate({
                                opacity: 1
                            }, menuAnimateSpeed / 2);
                            menuAnimateProcess = false;
                            menuOpened = false;
                        });
                    }
                }
            }

            $(document).ready(function() {
                $('#menuButton').on("click", function() {
                    toggleMenu();
                });
            });

        </script>
        @yield('scripts')
    </head>
    <body>
        {{-- Окно "О программе" --}}
        <div id="msg_aboutPragramm" style="display: none;">
            <div class="modalMsgParent">
                <div class="modalMsg">
                    <span class="title">О программе</span>
                    <div class="modalMsgContent">
                        <p>Lazzat (Версия от 03.04.22)</p>
                        <p>Разработано специально для кафе "Лазат"</p>
                    </div>
                    <input type="button" onclick="$(this).parent().parent().parent().hide()" class="btnOrange" style="float: right;" value="Закрыть">
                </div>
            </div>
        </div>

        {{-- Окно "Вы точно хотите выйти из аккаунта" --}}
        <div id="msg_exitFromAcc" style="display: none;">
            <div class="modalMsgParent">
                <div class="modalMsg">
                    <span class="title">Вы уверены что хотите выйти из аккаунта?</span>
                    <a href="{{ url('mobilePartApp/logout') }}"><input type="button" onclick="$(this).parent().parent().parent().hide(); toggleMenu();" class="btnOrange" style="margin-left: 10px; float: right;" value="Да"></a>
                    <input type="button" onclick="$(this).parent().parent().parent().hide()" class="btnTrans" style="float: right;" value="Нет">
                </div>
            </div>
        </div>

        <ul id="menu">
            @if (Auth::check())
                <a href="{{ route('main')}}" }}" onclick="toggleMenu()"><li>Главная</li></a>
                @if (auth()->user()->getRole() == "waiter" || auth()->user()->getRole() == "dev")
                    {{-- <a href="{{ route('types')}}" }}" onclick="toggleMenu()"><li>Блюда</li></route> --}}
                    {{-- <a href="{{ route('basket')}}" onclick="toggleMenu()"><li>Корзина</li></a>--}}
                    <a href="{{ route('Menu')}}" onclick="toggleMenu()"><li>Настройки блюда</li></a>
                    <a href="{{ route('createmenu')}}" onclick="toggleMenu()"><li>Добавление блюда</li></a>
                    <a href="{{ route('users')}}" onclick="toggleMenu()"><li>Пользователи</li></a>
                    <a href="#!" onclick="toggleMenu()"><li>Заявки</li></a>
                    <a href="#!" onclick="toggleMenu()"><li>Настройки</li></a>
                @endif
            @endif
            <a href="#!" onclick="$('#msg_aboutPragramm').show()"><li>О программе</li></a>
            @if (Auth::check())
                <a href="#!" onclick="$('#msg_exitFromAcc').show()"><li>Выйти из аккаунта</li></a>
            @endif
        </ul>


        <div class="header">
            <img id="menuButton" src="{{asset('/img/mobile/menu.png')}}">
            <p>@yield('title')</p>
        </div>
        <div id="content" class="content">
        @yield('content')
        </div>







    </body>

    {{-- Post includes  --}}

        <!-- Dinamicall -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/dynamicall.css') }}" />
        <style>
            dynamicall > .loading-logo > div {
                background-image: url({{ asset('img/mobile/loading.png') }});
            }
        </style>
        <script src="{{asset('/js/dynamicall.js')}}"></script>

</html>

