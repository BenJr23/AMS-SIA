
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
