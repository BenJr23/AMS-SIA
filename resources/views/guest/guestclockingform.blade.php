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
            width: 90%;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center h-screen p-4">
    <!-- Clock Display -->
    <div class="clock bg-white p-6 rounded-lg shadow-lg text-center mb-6">
        <h1 id="currentTime" class="text-4xl font-bold text-gray-800">00:00:00</h1>
        <p id="currentDate" class="text-gray-600 text-lg">January 1, 1970</p>
    </div>

    <!-- Form Container -->
    <div class="form-container bg-white p-6 rounded-lg shadow-lg">
        @php
            $Data = session('userData');
            if (!$Data) {
                echo "<script>window.location.href = '" . route('guest') . "';</script>";
                exit;
            }
            $dependentEntity = \App\Models\DependentEntity::where('username', $Data['username'])
                                    ->where('email', $Data['email'])
                                    ->first();

            $pendingAttendance = $dependentEntity
                ? \App\Models\Attendance::where('id', $dependentEntity->attendance_id)
                                        ->whereNull('time_out')
                                        ->first()
                : null;
        @endphp

        @if ($pendingAttendance)
            <!-- Time Out Form -->
            <form id="timeOutForm" action="{{ route('attendance.update', $pendingAttendance->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="time_out" name="time_out">
                <button type="button" id="timeOutButton" class="bg-red-600 text-white w-full py-3 rounded-lg shadow-md hover:bg-red-700 transition duration-200 focus:ring-4 focus:ring-red-300">
                    Time Out
                </button>
            </form>
        @else
            <!-- Time In Form -->
            <form id="timeInForm" action="{{ route('attendance.store2') }}" method="POST">
                @csrf
                <h1 class="text-xl font-semibold text-gray-800 text-center">
                    Good day, <span class="text-blue-600">{{ $Data['username'] }}</span>! 🎉<br>
                    You have successfully timed in.
                </h1>
                <input type="hidden" id="time_in" name="time_in">
                <input type="hidden" name="username" value="{{ $Data['username'] }}">
                <input type="hidden" name="email" value="{{ $Data['email'] }}">
                <button type="button" id="timeInButton" class="bg-blue-600 text-white w-full py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 focus:ring-4 focus:ring-blue-300">
                    Time In
                </button>
            </form>
        @endif
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM Content Loaded'); // Debugging confirmation

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
            updateClock();

            // Handle Time In Button
            const timeInButton = document.getElementById('timeInButton');
            if (timeInButton) {
                timeInButton.addEventListener('click', function () {
                    console.log('Time In Button Clicked');
                    const now = new Date();
                    const time = `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
                    document.getElementById('time_in').value = time;
                    document.getElementById('timeInForm').submit();
                });
            }

            // Handle Time Out Button
            const timeOutButton = document.getElementById('timeOutButton');
            if (timeOutButton) {
                timeOutButton.addEventListener('click', function () {
                    console.log('Time Out Button Clicked');
                    const now = new Date();
                    const time = `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
                    document.getElementById('time_out').value = time;
                    document.getElementById('timeOutForm').submit();
                });
            }
        });
    </script>
</body>
</html>
