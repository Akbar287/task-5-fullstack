<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ahp') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="div-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="Employee" src="{{ asset('/images/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ url('/home') }}">
                            <img src="{{ asset('/images/logo.png') }}" alt="logo" class="img-responsive" width="30"> PT. Xyz</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ url('/home') }}">
                            <img src="{{ asset('/images/logo.png') }}" alt="logo" class="img-responsive" width="30">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="{{ (Route::currentRouteName() == 'home') ? 'active': '' }}"><a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                        @if(Auth::user()->level == "peserta")
                        <li class="menu-header">Peserta</li>
                        <li class="{{ (Route::currentRouteName() == 'file') ? 'active': '' }}"><a class="nav-link" href="{{ url('/file') }}"><i class="fas fa-home"></i><span>Lamar Pekerjaan</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'hasil') ? 'active': '' }}"><a class="nav-link" href="{{ url('/hasil') }}"><i class="fas fa-user-circle"></i><span>Hasil Seleksi</span></a></li>
                        @endif
                        
                        @if(Auth::user()->level == "hrd")
                        <li class="menu-header">HRD</li>
                        <li class="{{ (Route::currentRouteName() == 'peserta') ? 'active': '' }}"><a class="nav-link" href="{{ url('/peserta') }}"><i class="fas fa-home"></i><span>Daftar Pelamar</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'penilaian') ? 'active': '' }}"><a class="nav-link" href="{{ url('/input-nilai') }}"><i class="fas fa-user-circle"></i><span>Penilaian</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'ranking') ? 'active': '' }}"><a class="nav-link" href="{{ url('/ranking') }}"><i class="fas fa-user-circle"></i><span>Perankingan</span></a></li>
                        @endif

                        @if(Auth::user()->level == "Admin")
                        <li class="menu-header">Admin</li>
                        <li class="{{ (Route::currentRouteName() == 'User') ? 'active': '' }}"><a class="nav-link" href="{{ url('/user') }}"><i class="fas fa-home"></i><span>Manajemen User</span></a></li>
                        @endif
                    </ul>
                </aside>
            </div>
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    AHP {{ now()->year }} <div class="bullet"></div> SPK
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
