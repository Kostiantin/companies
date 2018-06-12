<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body>

<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">{{ config('app.name', 'Laravel') }}</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="/">{{ __('Home') }}</a></li>
                        @guest
                            <li><a href="{{ route('login') }}">{{ __('Login')}}</a></li>
                            <li><a href="{{ route('register') }}">{{ __('Register')}}</a></li>
                        @else
                            <li><a href="{{ route('companies') }}">{{ __('Companies')}}</a></li>
                            <li><a href="{{ route('employees') }}">{{ __('Employees')}}</a></li>
                            <li><a href="{{ route('logout') }}">{{ __('Log Out')}}</a></li>
                        @endguest
                        </ul>

                    </nav>
                </div>
            </div>

            <div class="inner cover">

                @yield('content')

            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>Companies Laravel 5.6 project by Konstantin Zavizion 2018.</p>
                </div>
            </div>

        </div>

    </div>

</div>

@include('layouts.scripts')
</body>
</html>



















