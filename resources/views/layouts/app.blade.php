<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to HackerPair</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
</head>
<body>

<div class="containe">
    @include('flash::message')
    @yield('content')
</div>

</body>
</html>
