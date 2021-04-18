<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <style>
    .sidebar-container {
        position: fixed;
        width: 220px;
        height: 100%;
        left: 0;
        overflow-x: hidden;
        overflow-y: auto;
        background: #1a1a1a;
        color: #fff;
    }

    .content-container {
        padding-top: 20px;
    }

    .sidebar-logo {
        padding: 10px 15px 10px 30px;
        font-size: 20px;
        background-color: #2574A9;
    }

    .sidebar-navigation {
        padding: 0;
        margin: 0;
        list-style-type: none;
        position: relative;
    }

    .sidebar-navigation li {
        background-color: transparent;
        position: relative;
        display: inline-block;
        width: 100%;
        line-height: 20px;
    }

    .sidebar-navigation li a {
        padding: 10px 15px 10px 30px;
        display: block;
        color: #fff;
    }

    .sidebar-navigation li .fa {
        margin-right: 10px;
    }

    a{
        text-decoration: none;
    }

    .sidebar-navigation li a:active,
    .sidebar-navigation li a:hover,
    .sidebar-navigation li a:focus {
        text-decoration: none;
        outline: none;
    }

    .sidebar-navigation li::before {
        background-color: #2574A9;
        position: absolute;
        content: '';
        height: 100%;
        left: 0;
        top: 0;
        -webkit-transition: width 0.2s ease-in;
        transition: width 0.2s ease-in;
        width: 3px;
        z-index: -1;
    }

    .sidebar-navigation li:hover::before {
        width: 100%;
    }

    .sidebar-navigation .header {
        font-size: 12px;
        text-transform: uppercase;
        background-color: #151515;
        padding: 10px 15px 10px 30px;
    }

    .sidebar-navigation .header::before {
        background-color: transparent;
    }

    .content-container {
        padding-left: 220px;
    }
    </style>
</head>

<body>

    <div class="sidebar-container">
        <div class="sidebar-logo">
            Absensi
        </div>
        <ul class="sidebar-navigation">
            <li class="header">Navigation</li>
            <li>
                <a href="/home">
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                </a>
            </li>
            <li>
                <a href="/option">
                <i class="fa fa-cog" aria-hidden="true"></i> Option
                </a>
            </li>
            <li>
                <a href="/account">
                    <i class="fa fa-users" aria-hidden="true"></i> Account
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <div class="content-container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
</body>

</html>