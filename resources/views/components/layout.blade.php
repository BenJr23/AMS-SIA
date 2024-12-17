<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">MyApp</a>
            <div class="nav-buttons">
                <button class="btn btn-login" onclick="location.href='{{ route('guestclocking') }}'">Guest</button>
                <button class="btn btn-login" onclick="location.href='{{ route('login') }}'">Log In</button>

                <button class="btn btn-register" onclick="location.href='{{ route('clocking') }}'">Attendance</button>
            </div>
        </div>
    </nav>

    <main>
        {{$slot}}
    </main>
</body>
</html>