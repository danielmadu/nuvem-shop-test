<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Superhero CRUD</title>

</head>
<body>
    <h3>@yield('title')</h3>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
</html>