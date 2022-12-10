<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Лаззат - @yield('title')</title>

        @yield('styles')

        <link rel="stylesheet" type="text/css" href="{{ asset('/css/default.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/modalMsg.css') }}" />

        <script src="{{asset('/js/include/jquery-3.6.0.js')}}"></script>
        <script src="{{asset('/js/include/jquery-ui.js')}}"></script>
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
        @yield('pre-content')

        <ul id="menu">
            @if (Auth::check())
                <a href="{{ route('mainMobile')}}" }}" onclick="toggleMenu()"><li><img src="{{asset('img/mobile/бургер/main.png')}}" width="30" 
   height="25" margin="20px"> Главная </li></a>
                @if (auth()->user()->getRole() == "waiter" || auth()->user()->getRole() == "dev")
                    <a href="{{ route('typesMobile')}}" }}" onclick="toggleMenu()"><li><img src="{{asset('img/mobile/бургер/dish.png')}}" width="30" 
   height="30"> Блюда&nbsp; </li></route>
                    <a href="{{ route('basketMobile')}}" onclick="toggleMenu()"><li><img src="{{asset('img/mobile/бургер/basket.png')}}" width="25" 
   height="25">&nbsp; Корзина </li></a>
                    <a href="{{ route('ticketsMobile')}}" onclick="toggleMenu()"><li><img src="{{asset('img/mobile/бургер/applications.png')}}" width="30" 
   height="30"> Заявки&nbsp; </li></a>
                    <a href="{{ route('settingsMobile')}}" onclick="toggleMenu()"><li><img src="{{asset('img/mobile/бургер/settings.png')}}" width="30" 
   height="30"> Настройки </li></a>
                @endif
            @endif
            <a onclick='openModal("#msg_aboutPragramm")'><li><img src="{{asset('img/mobile/бургер/info.png')}}" width="30" 
   height="30"> О программе </li></a>
            @if (Auth::check())
                <a href="#!" onclick="openModal('#msg_exitFromAcc')"><li><img src="{{asset('img/mobile/бургер/exit.png')}}" width="30" 
   height="30"> Выйти из аккаунта </li></a>
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


    {{-- Modal msgs --}}

            {{-- Окно "О программе" --}}
            <modalmsg id="msg_aboutPragramm" title="О программе">
                <p>Lazzat (Версия от 03.04.22)</p>
                <p>Разработано специально для кафе "Лазат"</p>

                <button class="btnOrange" onclick='closeModal(this)'>Закрыть</button></a>
            </modalmsg>

            {{-- Окно "Вы точно хотите выйти из аккаунта" --}}
            <modalmsg id="msg_exitFromAcc" title="Выйти из аккаунта">
                <p>Вы уверены что хотите выйти из аккаунта?</p>

                <a href="{{ url('mobilePartApp/logout') }}"><button class="btnOrange" onclick='closeModal(this)'>Да</button></a>
                <button class="btnOrange" onclick='closeModal(this)'>Нет</button></a>
            </modalmsg>

    {{-- Modal includes  --}}

        <!-- Modal -->
        <script src="{{asset('/js/modalMsg.js')}}"></script>

    @yield('post-body')


</html>
