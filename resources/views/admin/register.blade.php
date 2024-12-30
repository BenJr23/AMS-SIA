<x-admin>
    @auth
        <!-- Direction of Tabs -->
        <section class="fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
            <p class="text-sm">
                <i class="fas fa-home text-gray-800"></i>
                Dashboard / Employee
            </p>
        </section>

        <!-- Scrollable Box below the Direction Tabs -->
        <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
            <div class="p-4 text-center text-gray-500">
                <!--No content -->
                <div class="p-6">
                    <h1 class="text-3xl font-bold">Register</h1>

                     <!-- Pop-up for Success Message -->
                     @if (session('success'))
                            <div id="successPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-96 text-center">
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

                                    if (closeBtn) {
                                        closeBtn.addEventListener('click', () => {
                                            if (popup) popup.remove();
                                        });
                                    }
                                });
                            </script>
                    @endif

                    <form action="{{ route('register') }}" method="POST" class="space-y-6 p-6">
                        @csrf

                        <!-- Row for User Name and First Name -->
                        <div class="flex flex-wrap gap-6">
                            <div class="flex-1">
                                <label for="username" class="block font-medium mb-1 text-left">User Name</label>
                                <input type="text" id="username" name="username"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-300 {{ $errors->has('username') ? 'ring-red-500' : '' }}" required>
                                @error('username')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label for="first_name" class="block font-medium mb-1 text-left">First Name</label>
                                <input type="text" id="first_name" name="first_name" 
                                    class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-300" required>
                            </div>
                        </div>

                        <!-- Row for Last Name and Email -->
                        <div class="flex flex-wrap gap-6">
                            <div class="flex-1">
                                <label for="last_name" class="block font-medium mb-1 text-left">Last Name</label>
                                <input type="text" id="last_name" name="last_name" 
                                    class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-300" required>
                            </div>
                            <div class="flex-1">
                                <label for="email" class="block font-medium mb-1 text-left">Email</label>
                                <input type="email" id="email" name="email" 
                                    class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-300" required>
                            </div>
                        </div>

                        <!-- Row for Password and Confirm Password -->
                        <div class="flex flex-wrap gap-6">
                            <div class="flex-1">
                                <label for="password" class="block font-medium mb-1 text-left">Password</label>
                                <input type="password" id="password" name="password"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-300 {{ $errors->has('password') ? 'ring-red-500' : '' }}" required>
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label for="password_confirmation" class="block font-medium mb-1 text-left">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-300 {{ $errors->has('password') ? 'ring-red-500' : '' }}" required>
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Single Row for Role (Shortened) -->
                        <div>
                            <label for="role" class="block font-medium mb-1 text-center">Role</label>
                            <select id="role" name="role" 
                                class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-300" required>
                                <option value="admin">Admin</option>
                                <option value="Cataloguer">Cataloguer</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Stuff">Stuff</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                            <button type="submit" 
                                class="w-full md:w-1/2 bg-green-500 text-white font-semibold p-3 rounded-md hover:bg-green-600 focus:ring focus:ring-green-300">
                                Register
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

                
    @endauth

</x-admin>



