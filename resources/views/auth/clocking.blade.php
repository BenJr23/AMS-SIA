<x-layout>
    @vite('resources/js/clocking.js')
    <div class="form-container">
        <div class="flex justify-center items-center mb-5">
            <img src="./images/logo.png" alt="library logo" class="h-32 w-auto -my-9">
        </div>

        <h1>Clocking</h1>

        <!-- Displaying error messages from validation. THIS IS THE CHANGES FOR ERROR MESSAGE. -->
        @if($errors->any())
            <div class="text-red-500 text-sm mb-4">
                @foreach($errors->all() as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif

        <form id="clockingForm" action="{{ route('clocking') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="text-green-500">Email</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500" required>
                {{-- THIS IS THE CHANGES FOR ERROR MESSAGE. --}}
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group relative">
                <label for="password" class="text-green-500">Password</label>
                <input type="password" id="password" name="password" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500 pr-10" required>
                <!-- Eye icon for password visibility toggle inside the input field -->
                <i id="togglePassword" class="fas fa-eye absolute right-3 mt-5 cursor-pointer"></i> <!-- Adjust top-2 for lowering -->
                {{-- THIS IS THE CHANGES FOR ERROR MESSAGE. --}}
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-green-500 text-white hover:bg-green-700 p-2 rounded">Login</button>
        </form>
    </div> 
</x-layout>
