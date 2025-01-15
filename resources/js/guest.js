
// Username Validation
document.getElementById('clockingForm').addEventListener('submit', function(event) {
    let formIsValid = true;

    // Username Validation (Required)
    const username = document.getElementById('username').value;
    const usernameError = document.getElementById('usernameError');
    if (!username) {
        formIsValid = false;
        usernameError.classList.remove('hidden'); // Show error message
    } else {
        usernameError.classList.add('hidden'); // Hide error message
    }

    // Email Validation (Valid email format)
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        formIsValid = false;
        emailError.classList.remove('hidden'); // Show error message
    } else {
        emailError.classList.add('hidden'); // Hide error message
    }

    // Prevent form submission if any validation fails
    if (!formIsValid) {
        event.preventDefault();
    }
});