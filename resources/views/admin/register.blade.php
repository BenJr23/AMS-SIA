<x-admin>
    @auth
    <div class="form-container">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" required>
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
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
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