<nav class="navbar navbar-expand-md shadow-sm">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <a class="navbar-brand" href="{{ url('/') }}">
                News Web
            </a>

            <ul class="navbar-nav ms-auto align-items-md-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/genre">Genre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/film">film</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-md-center">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item ms-lg-5 ms-md-3">
                            <a class="btn btn-primary w-md-0 w-100" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item ms-md-2">
                            <a class="btn btn btn-outline-secondary w-md-0 w-100 mt-md-0 mt-2"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown ms-lg-5 ms-md-3">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('beranda') }}"
                                             >
                                {{ __('Beranda') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
