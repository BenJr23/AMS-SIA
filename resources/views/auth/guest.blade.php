<x-layout>
    @vite('resources/js/guest.js')
    <div class="form-container">
        <div class="flex justify-center items-center mb-5">
            <img src="./images/logo.png" alt="library logo" class="h-32 w-auto -my-9">
        </div>

        <h1>Guest</h1>

        <!-- Displaying error messages from validation. THIS IS THE CHANGES FOR ERROR MESSAGE. -->
        @if($errors->any())
            <div class="text-red-500 text-sm mb-4">
                @foreach($errors->all() as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif

        <form id="clockingForm" action="{{ route('clockval') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username" class="text-green-500">Username</label>
                <input type="text" id="username" name="username" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500" required>
                {{-- THIS IS THE CHANGES FOR ERROR MESSAGE. --}}
                @error('username') 
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="text-green-500">Email</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500" required>
                {{-- THIS IS THE CHANGES FOR ERROR MESSAGE. --}}
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white hover:bg-green-700 p-2 rounded">Time In/Out</button>
        </form>
    </div> 
</x-layout>
