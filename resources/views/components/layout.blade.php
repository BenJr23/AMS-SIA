<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" sizes="192x192">
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
            <ul class="flex space-x-4">
                <!-- Default active highlight on the Login menu item -->
                <li>
                    <a href="/login" id="login" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white bg-[#22C55E]">
                        <i class="fas fa-tachometer-alt mr-4"></i> Login
                    </a>
                </li>
                <li>
                    <a href="/clocking" id="clocking" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-[#22C55E]">
                        <i class="fas fa-user-tie mr-4"></i> Attendance
                    </a>
                </li>
                <li>
                    <a href="/guest" id="guest" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-[#22C55E]">
                        <i class="fas fa-calendar-check mr-4"></i> Guest
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        {{$slot}}
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const currentUrl = window.location.pathname;
            const sidebarLinks = document.querySelectorAll('.sidebar-item');

            let activeSet = false;

            // Loop through links to find the matching URL
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.classList.add('active', 'bg-[#22C55E]');
                    link.classList.remove('hover:bg-[#22C55E]');
                    activeSet = true;
                } else {
                    link.classList.remove('active', 'bg-[#22C55E]');
                }
            });

            // Ensure the "Login" menu is active if no other link matches
            if (!activeSet) {
                const defaultLink = document.querySelector('#login');
                defaultLink.classList.add('active', 'bg-[#22C55E]');
            }
        });
    </script>
</body>
</html>
