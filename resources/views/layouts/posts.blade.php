<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .container{
            max-width: 960px;
            margin: auto;
            background: #ccc;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @hasSection('navigation')
            <div class="pull-right">
                @yield('navigation')
            </div>
            <div class="clearifix"></div>
        @endif
        <h2>@yield('title')</h2>

        @if(Session::has('message'))
            <p>{{Session::get('message')}}</p>;
        @endif
        @yield('content')
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
