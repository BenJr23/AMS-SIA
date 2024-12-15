<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clocking</title>
</head>
<body>
    @auth
        @php
            // Check if the user has an attendance entry with time_out = null
            $pendingAttendance = \App\Models\Attendance::where('user_id', auth()->id())
                                ->whereNull('time_out')
                                ->first();
        @endphp

        @if ($pendingAttendance)
            {{-- Time Out Form --}}
            <form id="timeOutForm" action="{{ route('attendance.update', $pendingAttendance->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Required for updating --}}
                <label for="time_out">Time Out:</label>
                <input type="time" id="time_out" name="time_out" readonly>

                <button type="button" id="timeOutButton">Time Out</button>
            </form>
        @else
            {{-- Time In Form --}}
            <form id="timeInForm" action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <label for="time_in">Time In:</label>
                <input type="time" id="time_in" name="time_in" readonly>
    
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    
                <button type="button" id="timeInButton">Time In</button>
            </form>
        @endif

        <script>
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