<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link  href="{{ asset('css/custom-css/theme.css') }}"  rel="stylesheet">
    <link  href="{{ asset('css/custom-css/material-kit.css') }}"  rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img class="d-inline-block ms-2" src="{{asset('img/logo-deliveboo/logo.svg')}}" alt="logo" />
                    <a class="navbar-brand text-1000 fs-3 fw-bold ms-2 text-gradient" href="{{ route('guest') }}">
                        DeliveBoo
                    </a>

                <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon mt-2">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </span>
                  </button>

                <div class="navbar-collapse w-100 pt-3 pb-2 py-lg-0  collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <!-- Authentication Links -->
                        @guest
                        <ul class="navbar-nav navbar-nav-hover  ">
                                <li class="nav-item mx-2">
                                    <a class=" btn bg-gradient-success dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item mx-2">
                                        <a class=" btn bg-gradient-warning dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            </ul>
                            @else
                        <div class="dropdown">
                            <a  class="btn bg-gradient-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" v-pre>

                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                              <li>
                                <a class="dropdown-item btn bg-gradient-danger"  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </ul>
                        </div>
                        @endguest

                </div>
            </div>
        </nav>


        <main>
            @yield('content')
        </main>
    </div>
    @yield('script')
    {{-- <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script> --}}

</body>
</html>


