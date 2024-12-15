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
    <div class="sidebar">
        <div class="sidebar-container">
            <h2 class="sidebar-title">Dashboard</h2>
            <div class="sidebar-buttons">
                <a href="/employees" class="sidebar-btn btn-employees">Employees</a>
                <a href="/register" class="sidebar-btn btn-register">Register</a>
            </div>
            <a href="#" 
                class="sidebar-btn btn-logout sidebar-logout" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Log Out
            </a>

            <!-- Hidden logout form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <main>
        {{$slot}}
    </main>
</body>
</html>