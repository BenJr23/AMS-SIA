

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
