<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="./images/logo.png" sizes="192x192">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presenza</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#D4D7DA]">
    <nav class="navbar bg-[#183D2C] h-22">
        <div class="container flex items-center justify-between h-full">
            <img src="./images/2.png" alt="library logo" class="h-32 w-auto -my-9">
            <div class="nav-buttons flex space-x-4">
                <button class="hover:bg-[#136A4D] btn btn-login text-white bg-transparent" onclick="location.href='{{ route('login') }}'">Log In</button>
                <button class="hover:bg-[#136A4D] btn btn-register text-white bg-transparent" onclick="location.href='{{ route('clocking') }}'">Attendance</button>
                <button class="hover:bg-[#136A4D] btn btn-register text-white bg-transparent" onclick="location.href='{{ route('guest') }}'">Guest</button>
            </div>
        </div>
    </nav>




    <main>
        {{$slot}}
    </main>
</body>
</html>