<x-admin>
    @auth
        <div class="form-container">
            <h1>Register</h1>

            <!-- Pop-up for Success Message -->
            @if (session('success'))
                <div id="successPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center">
                        <h2 class="text-lg font-bold text-green-700">Success</h2>
                        <p class="text-gray-700 mt-2">{{ session('success') }}</p>
                        <button id="closePopup" 
                            class="mt-4 px-4 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600">
                            OK
                        </button>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const popup = document.getElementById('successPopup');
                        const closeBtn = document.getElementById('closePopup');

                        // Close the popup when the "OK" button is clicked
                        if (closeBtn) {
                            closeBtn.addEventListener('click', () => {
                                if (popup) popup.remove();
                            });
                        }
                    });
                </script>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username"
                        class="input {{ $errors->has('username') ? 'ring-red-500' : '' }}" required>
                    @error('username')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" 
                        class="input {{ $errors->has('password') ? 'ring-red-500' : '' }}" required>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                        class="input {{ $errors->has('password') ? 'ring-red-500' : '' }}" required>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="Cataloguer">Cataloguer</option>
                        <option value="Librarian">Librarian</option>
                        <option value="Stuff">Stuff</option>
                    </select>
                </div>
                <!-- Dynamically set the created_by field to the logged-in user's ID -->
                <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                <button type="submit">Register</button>
            </form>
        </div>
    @endauth
</x-admin>
