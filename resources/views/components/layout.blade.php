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
                <li><a href="/login" id="login" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white active bg-[#22C55E]">
                    <i class="fas fa-tachometer-alt mr-4"></i> Login</a></li>
                <li><a href="/clocking" id="clocking" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-[#22C55E] hover:text-white">
                    <i class="fas fa-user-tie mr-4"></i> Attendance</a></li>
                <li><a href="/guest" id="guest" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-[#22C55E] hover:text-white">
                    <i class="fas fa-calendar-check mr-4"></i> Guest</a></li>
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

        // Remove the 'bg-[#22C55E]' class from all items first
        sidebarLinks.forEach(link => {
            link.classList.remove('bg-[#22C55E]');
        });

        // Highlight the link matching the current URL
        let activeFound = false;
        sidebarLinks.forEach(link => {
            if (link.getAttribute('href') === currentUrl) {
                link.classList.add('bg-[#22C55E]');
                activeFound = true;
            }
        });

        // Highlight the default link if no match is found
        if (!activeFound) {
            const defaultLink = document.querySelector('#login');
            if (defaultLink) {
                defaultLink.classList.add('bg-[#22C55E]');
            }
        }
    });
</script>


</body>
</html>
