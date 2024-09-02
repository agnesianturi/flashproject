<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Master Page</title>
</head>
<body>
    <div class="container-fluid m-0 p-0">
        <div class="d-flex flex-column justify-content-center align-items-center text-white" style="width: 100%; height:10rem; background-color: orangered">
            <h1>Flash News</h1>
            <h6 style="font-weight: normal">Citizen Journalism</h6>
        </div>

        @if(!Auth::check())
            @include('layout.guest_navbar')
        @elseif(Auth::check() && Auth::user()->role == 'Admin')
            @include('layout.admin_navbar')
        @elseif(Auth::check() && Auth::user()->role == 'User')
            @include('layout.user_navbar')
        @endif
        

        <div class="m-5">
            @yield('content')
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>