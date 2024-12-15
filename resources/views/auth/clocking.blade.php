<x-layout>
    <div class="form-container">
        <h1>Clocking</h1>
        <form action="{{ route('clocking') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            
        </form>
    </div> -->
</x-layout>