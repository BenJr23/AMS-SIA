<x-layout>
    @vite('resources/js/guest.js')
    <div class="form-container">
        <div class="flex justify-center items-center mb-5">
            <img src="./images/logo.png" alt="library logo" class="h-32 w-auto -my-9">
        </div>

        <h1>Guest</h1>

        <form id="clockingForm" action="{{ route('clockval') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username" class="text-green-500">Username</label>
                <input type="text" id="username" name="username" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500" required>
                <p id="usernameError" class="text-red-500 text-sm hidden">Please enter a valid username.</p>
            </div>
            <div class="form-group">
                <label for="email" class="text-green-500">Email</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-green-500" required>
                <p id="emailError" class="text-red-500 text-sm hidden">Please enter a valid email address.</p>
            </div>

            <button type="submit" class="bg-green-500 text-white hover:bg-green-700 p-2 rounded">Time In/Out</button>
        </form>
    </div> 
</x-layout>

