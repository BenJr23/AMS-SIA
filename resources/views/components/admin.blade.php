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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!--for the graph-->

    <title>Presenza</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 overflow-x-hidden">

    <!-- Sidebar -->
    <div class="sidebar bg-[#183D2C] w-72 fixed top-0 left-0 h-full transition-transform transform lg:translate-x-0 -translate-x-full lg:w-72 z-30">
        <div class="sidebar-container">
            <img src="./images/2.png" alt="library logo" class="h-auto w-40 -my-9 mb-10">
            <div class="sidebar-buttons">
                <!-- Dashboard Link -->
                <a href="/home" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-green-500 hover:text-white transition-colors duration-300 text-lg" id="dashboard-link">
                    <i class="fas fa-tachometer-alt mr-4"></i> Dashboard
                </a>
                <!-- Employees Link -->
                <a href="/employee" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-green-500 hover:text-white transition-colors duration-300 text-lg" id="employees-link">
                    <i class="fas fa-users mr-4"></i> Employees
                </a>
                <!-- Register Link -->
                <a href="/register" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-green-500 hover:text-white transition-colors duration-300 text-lg" id="register-link">
                    <i class="fas fa-user-plus mr-4"></i> Register
                </a>
            </div>
            <!-- Log Out Link -->
            <a href="#" onclick="openModal('LogoutModal')" class="sidebar-item flex items-center py-3 px-6 rounded-lg text-white hover:bg-red-500 hover:text-white transition-colors duration-300 text-lg mt-auto" id="logout-link">
                <i class="fas fa-sign-out-alt mr-4"></i> Log Out
            </a>
        </div>
    </div>

     <!-- Logout Modal -->
        <div id="LogoutModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-md w-[60%] max-w-sm">
                <h1 class="text-2xl font-semibold text-center mb-6">Are you sure you want to log out of this account?</h1>

                <!-- Hidden Logout Form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <!-- Inline Cancel and Log Out Buttons -->
                <div class="flex justify-center space-x-4">
                    <!-- Cancel Button with Icon -->
                    <button type="button" onclick="closeModal('LogoutModal')" class="flex items-center px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">
                        <i class="fas fa-times mr-2"></i> Cancel
                    </button>

                    <!-- Log Out Button with Icon -->
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                    </a>
                </div>
            </div>
        </div>


   
    <!-- Main Content -->
    <div class="lg:ml-40 pt-20 pb-8 w-full flex justify-center lg:pl-0 pl-3">
        <!-- Header -->
        <header class="flex items-center px-10 py-4 bg-white shadow-md z-20 fixed top-0 right-0 border-b border-gray-200 w-full lg:w-[82%] ml-auto justify-between">
            <!-- Hamburger Button (for small screens) -->
            <button id="hamburger-btn" class="lg:hidden text-black z-40 mr-4">
                <i class="fas fa-bars text-2xl"></i>
            </button>

            <!-- Left Side: User Name & Role -->
            <div class="flex items-center space-x-4">
                <div class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded-full">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">[NAME]</p>
                    <p class="text-sm text-gray-500">Administrator</p>
                </div>
            </div>

            <!-- Right Side: Bell and Settings Icons -->
            <div class="ml-auto flex items-center space-x-4">
                <i class="fas fa-bell text-gray-600"></i>
                <i class="fas fa-cog text-gray-600"></i>
            </div>
        </header>

        <!-- Main Content Slot -->
        <main class="w-full lg:w-4/5 mt-24 lg:mt-0">{{$slot}}</main>
    </div>

    <script>
        // Get the current path
        const currentPath = window.location.pathname;
        
        // Select all sidebar links
        const sidebarLinks = document.querySelectorAll('.sidebar-item');
        
        // Remove highlight from all sidebar links
        sidebarLinks.forEach(link => {
            link.classList.remove('bg-[#13684C]');  // Remove the highlight class from all links
        });

        // Set default active state for '/dashboard' or root '/'
        if (currentPath === '/dashboard' || currentPath === '/') {
            document.getElementById('dashboard-link').classList.add('bg-[#13684C]'); // Highlight the Dashboard link by default
        } else {
            // Highlight the active link based on the current path
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('bg-[#13684C]');  // Add highlight to the active link
                }
            });
        }

        // Add event listener to update the active link on click
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                sidebarLinks.forEach(link => link.classList.remove('bg-[#13684C]')); // Remove highlight from all
                this.classList.add('bg-[#13684C]');  // Add highlight to clicked link
            });
        });

        // Toggle the sidebar visibility when hamburger button is clicked
        document.getElementById('hamburger-btn').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });


        //for the logout modal
        // Function to open a modal by ID
        function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
                modal.classList.remove('hidden'); // Remove the hidden class
                modal.classList.add('flex'); // Add the flex class to display the modal
        }
        }

        // Function to close a modal by ID
        function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
                modal.classList.add('hidden'); // Add the hidden class to hide the modal
                modal.classList.remove('flex'); // Remove the flex class
        }
        }
    </script>

</body>
</html>
