@include('layouts.frame.head')

<body>
    <div id="app">
        @include('components.theme')
        @auth
            @include('layouts.navbar.auth.topnav')
            <main>
                @yield('content')
            </main>
        @endauth

        @guest
            @if (in_array(request()->route()->getName(),
                    ['login', 'register', 'password.request', 'password.email', 'password.reset']))
                @include('layouts.navbar.guest.topnav')
                <main>
                    @yield('content')
                </main>
            @else
                @include('layouts.navbar.guest.topnav')
                <main>
                    @yield('content')
                </main>
                @include('layouts.footer.guest.footer')
            @endif
        @endguest

    </div>

    @include('layouts.frame.foot')
</body>

</html>
