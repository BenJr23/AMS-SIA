<x-layout>
    <div class="form-container">
        <h1>Clocking</h1>
        <form action="{{ route('clockval') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">User name</label>
                <input type="test" id="username" name="username" required>
            </div>
            <button type="submit">Login</button>
            
        </form>
    </div> -->
</x-layout>