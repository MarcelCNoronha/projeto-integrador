<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

@include('layouts.header')
@yield('content')

@include('layouts.footer')

</body>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</html>
