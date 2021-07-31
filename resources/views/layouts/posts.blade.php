<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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

        {{--@if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif--}}

        @yield('content')
    </div>
</body>
</html>
