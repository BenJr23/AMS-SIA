<x-layout>
    <div class="form-container">
        <div class="flex justify-center items-center mb-5">
            <img src="./images/logo.png" alt="library logo" class="h-32 w-auto -my-9">
        </div>

        <h1>Login</h1>

        <form id="loginForm" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="text-green-500">Email</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500" required>
                <p id="emailError" class="text-red-500 text-sm hidden">Please enter a valid email address.</p>
            </div>
            <div class="form-group relative">
                <label for="password" class="text-green-500">Password</label>
                <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500 pr-10" required>
                <!-- Eye icon for password visibility toggle inside the input field -->
                <i id="togglePassword" class="fas fa-eye absolute right-3 mt-6 transform -translate-y-1/2 cursor-pointer"></i>
            </div>
            <button type="submit" class="bg-green-500 text-white hover:bg-green-700 p-2 rounded">Login</button>
        </form>
    </div> 
</x-layout>

<script>
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
</script>
