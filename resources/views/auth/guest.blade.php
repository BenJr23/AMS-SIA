<x-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
         <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md sm:-mt-4 md:-mt-6 lg:-mt-40">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Guest</h2>

            <div class="space-y-4">
                <!-- Username Field -->
                <div>
                    <label class="text-sm text-gray-600">Username <span class="text-red-500">*</span></label>
                    <input type="text" placeholder="Enter your username" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="username" required>
                    <p id="usernameError" class="text-red-500 text-sm hidden">Username is required.</p>
                </div>

                <!-- Email Field -->
                <div>
                    <label class="text-sm text-gray-600">Email <span class="text-red-500">*</span></label>
                    <input type="email" placeholder="example@example.com" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="email" required>
                    <p id="emailError" class="text-red-500 text-sm hidden">A valid email is required.</p>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full mt-4 px-3 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Validation logic
        document.querySelector("#username").addEventListener("blur", () => {
            const username = document.querySelector("#username").value.trim();
            const usernameError = document.querySelector("#usernameError");
            if (!username) {
                usernameError.classList.remove("hidden");
            } else {
                usernameError.classList.add("hidden");
            }
        });

        document.querySelector("#email").addEventListener("blur", () => {
            const email = document.querySelector("#email").value.trim();
            const emailError = document.querySelector("#emailError");
            const emailRegex = /^[^\s@]+@[\^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                emailError.classList.remove("hidden");
            } else {
                emailError.classList.add("hidden");
            }
        });
    </script>
</x-layout>
