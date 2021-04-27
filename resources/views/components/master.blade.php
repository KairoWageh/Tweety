<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tweety') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/toastr.css') }}">
    @if(direction() == 'rtl')
        <link rel="stylesheet" href="{{asset('public/css/bootstrap-rtl.css') }}">
        <link rel="stylesheet" href="{{asset('public/css/style-ar.css') }}">
    @endif
</head>
<body>
{{--    <!-- Language -->--}}
{{--    <ul class='nav'>--}}
{{--      <li>--}}
{{--        <div class="dropdown">--}}
{{--          <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{__('language')}}</a>--}}
{{--          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">--}}
{{--            <li>--}}
{{--              <a href="{{ url('locale/en') }}"> English </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--              <a href="{{ url('locale/ar') }}"> العربية</a>--}}
{{--            </li>--}}
{{--          </ul>--}}
{{--        </div>--}}
{{--        </li>--}}
{{--    </ul>--}}

    <div id="app">
        <section class="px-8 py-4">
            <header class="container mx-auto">
                <h1>
                    <img src="{{asset('public/images/logo.svg')}}" alt="twetty">
                </h1>
            </header>
        </section>
        {{ $slot }}

    </div>
    <script src="http://unpkg.com/turbolinks"></script>
    <script src="{{asset('public/js/toastr.min.js')}}"></script>
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
