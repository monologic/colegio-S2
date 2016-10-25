<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Robert Gagne</title>

    <link href="{{ asset('assets/login/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-blue.css') }}" rel="stylesheet">


</head>
<body id="app-layout">
   

    @yield('content')
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="{{asset('assets/login/js/index.js')}}"></script>
</body>
</html>
