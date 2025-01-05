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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #D2D4D7;
            margin: 0;
        }
        .clock, .form-container {
            max-width: 400px;
            width: 90%; /* Ensures responsiveness for smaller screens */
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center h-screen p-4">

    @auth
        <!-- Clock Display -->
        <div class="clock bg-white p-6 rounded-lg shadow-lg text-center mb-6">
            <h1 id="currentTime" class="text-4xl font-bold text-gray-800">00:00:00</h1>
            <p id="currentDate" class="text-gray-600 text-lg">January 1, 1970</p>
        </div>

        <!-- Form Container -->
        <div class="form-container bg-white p-6 rounded-lg shadow-lg">

            @php
                $pendingAttendance = \App\Models\Attendance::where('user_id', auth()->id())
                                    ->whereNull('time_out')
                                    ->first();
            @endphp

            @if ($pendingAttendance)
                <!-- Time Out Form -->
                <form id="timeOutForm" action="{{ route('attendance.update', $pendingAttendance->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="time_out" name="time_out">

                    <button type="button" id="timeOutButton"
                            class="bg-red-600 text-white w-full py-3 rounded-lg shadow-md hover:bg-red-700 transition duration-200 focus:ring-4 focus:ring-red-300">
                        Time Out
                    </button>
                </form>
            @else
                <!-- Time In Form -->
                <form id="timeInForm" action="{{ route('attendance.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Greeting Header -->
                    <h1 class="text-xl font-semibold text-gray-800 text-center">
                        Good day, <span class="text-blue-600">[Name]</span>! 🎉<br>
                        You have successfully timed in.
                    </h1>

                    <!-- Hidden Inputs -->
                    <input type="hidden" id="time_in" name="time_in">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <!-- Time In Button -->
                    <button type="button" id="timeInButton"
                            class="bg-blue-600 text-white w-full py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 focus:ring-4 focus:ring-blue-300">
                        Time In
                    </button>
                </form>
            @endif
        </div>

        <!-- JavaScript -->
        <script>
            // Function to update the clock display
            function updateClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');

                const day = now.toLocaleString('default', { weekday: 'long' });
                const date = now.toLocaleString('default', { month: 'long', day: 'numeric', year: 'numeric' });

                document.getElementById('currentTime').textContent = `${hours}:${minutes}:${seconds}`;
                document.getElementById('currentDate').textContent = `${day}, ${date}`;
            }

            // Update the clock every second
            setInterval(updateClock, 1000);

            // Initialize the clock display
            updateClock();

            // Handle Time In Button
            document.getElementById('timeInButton')?.addEventListener('click', function () {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const currentTime = `${hours}:${minutes}`;

                // Set the time_in input value
                document.getElementById('time_in').value = currentTime;

                // Submit the form
                document.getElementById('timeInForm').submit();
            });

            // Handle Time Out Button
            document.getElementById('timeOutButton')?.addEventListener('click', function () {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const currentTime = `${hours}:${minutes}`;

                // Set the time_out input value
                document.getElementById('time_out').value = currentTime;

                // Submit the form
                document.getElementById('timeOutForm').submit();
            });
        </script>
    @endauth
</body>
</html>
