<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clocking</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .clock {
            text-align: center;
            background: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .clock h1 {
            margin: 0;
            font-size: 3rem;
            color: #333;
        }
        .clock p {
            margin: 5px 0 0;
            font-size: 1.2rem;
            color: #666;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container label {
            font-size: 1rem;
            color: #333;
            display: block;
            margin-bottom: 10px;
        }
        .form-container button {
            margin-top: 15px;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
        <div class="clock">
            <h1 id="currentTime">00:00:00</h1>
            <p id="currentDate">January 1, 1970</p>
        </div>

        <div class="form-container">
            @php
                $Data = session('userData'); // Retrieve the user data from the session

                if (!$Data) {
                    echo "<script>window.location.href = '" . route('guestclocking') . "';</script>";
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
                {{-- Time Out Form --}}
                <form id="timeOutForm" action="{{ route('attendance.update', $pendingAttendance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="time_out">Time Out:</label>
                    <input type="hidden" id="time_out" name="time_out">

                    <button type="button" id="timeOutButton">Time Out</button>
                </form>
            @else
                {{-- Time In Form --}}
                <form id="timeInForm" action="{{ route('attendance.store2') }}" method="POST">
                    @csrf
                    <label for="time_in">Time In:</label>
                    <input type="hidden" id="time_in" name="time_in">

                    <input type="hidden" name="username" value="{{ $Data['username'] }}">
                    <input type="hidden" name="email" value="{{ $Data['email'] }}">

                    <button type="button" id="timeInButton">Time In</button>
                </form>
            @endif
        </div>

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
</body>
</html>
