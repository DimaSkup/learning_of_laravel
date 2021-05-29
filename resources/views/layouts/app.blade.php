<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to HackerPair</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
</head>
<body>

<div class="container">
    <div class="flash-message" style="color:green;">
        @include('flash::message')
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
