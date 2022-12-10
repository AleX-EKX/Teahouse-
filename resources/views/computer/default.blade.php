<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=10" />
        <title>Лаззат - @yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('/css/default.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/defaultComputer.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/modalMsg.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/dynamicall_comp.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/filterplace.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/table.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/form.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/imgLoader.css') }}" />
        @yield('styles')
        {{-- Global vars: pathes --}}
        <script>
            var PATH_CONTEXTMENU_IMG = "{{ asset('img/contextMenu.png') }}";
        </script>
        <script src="{{asset('/js/include/jquery-3.6.0.js')}}"></script>
        <script src="{{asset('/js/include/jquery-ui.js')}}"></script>
        <script>

        </script>
        @yield('scripts')
    </head>

    <body>
        <div id="content" class="content">
        @yield('content')
        </div>
    </body>

    {{-- Post includes  --}}
        <!-- Dinamicall -->
        <style>
            dynamicall > .loading-logo > div {
                background-image: url({{ asset('img/mobile/loading.png') }});
            }
        </style>
        <script src="{{asset('/js/dynamicall.js')}}"></script>
        <!-- Modal -->
        <script src="{{asset('/js/modalMsg.js')}}"></script>

    @yield('post-body')
</html>
