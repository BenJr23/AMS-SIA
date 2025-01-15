

    // Email Validation
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        const email = document.getElementById('email').value;
        const emailError = document.getElementById('emailError');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            event.preventDefault(); // Prevent form submission
            emailError.classList.remove('hidden'); // Show error message
        } else {
            emailError.classList.add('hidden'); // Hide error message
        }
    });

    // Password visibility toggle
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        // Toggle password visibility
        const isPasswordHidden = passwordField.type === 'password';
        passwordField.type = isPasswordHidden ? 'text' : 'password';

        // Toggle icon
        togglePassword.classList.toggle('fa-eye');
        togglePassword.classList.toggle('fa-eye-slash');
    });
