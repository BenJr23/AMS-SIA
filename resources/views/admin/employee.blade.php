@vite('resources/js/employee.js')


<x-admin>
    @auth
        <!-- Direction of Tabs -->
        <section class="fixed ml-72 px-11 py-6 w-full top-20 left-0">
            <p class="text-sm">
                <i class="fas fa-home text-gray-800"></i>
                <a a href="/home">Dashboard</a> / Employee
            </p>
        </section>

        <!-- Scrollable Box below the Direction Tabs -->
        <div
            class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
            <div class="p-4 text-center text-gray-500">
                <!-- No content -->

                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Employees</h2>
                        <div class="flex items-center space-x-2">
                            <input type="text" placeholder="Search"
                                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500" />
                            <button class="p-2 rounded-md bg-gray-100 hover:bg-gray-200">
                                <i class="fa fa-search w-5 h-5 text-gray-600"></i>
                            </button>
                        </div>


                    </div>

                    <div class="mb-4 flex justify-start">
                        <button onclick="openModal('NewModal')"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600">
                            New Member
                        </button>
                    </div>


                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-green-500 text-white">
                                    <th class="py-2 px-4 text-center">Employee</th>
                                    <th class="py-2 px-4 text-center">Employee Type</th>
                                    <th class="py-2 px-4 text-center">Join</th>
                                    <th class="py-2 px-4 text-center">Status</th>
                                    <th class="py-2 px-4 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">

                                    <td class="py-3 px-4 flex items-center space-x-3">
                                        <div
                                            class="bg-gray-200 rounded-full w-10 h-10 flex items-center justify-center text-black font-bold">
                                            N
                                        </div>
                                        <div class="items-start text-left">
                                            <p class="font-medium">Nadine Borja</p>
                                            <p class="text-sm text-gray-500">nadine9567@gmail.com</p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">Administrator</td>
                                    <td class="py-3 px-4">1-1-2025</td>
                                    <td class="py-3 px-4 text-green-600">Active</td>
                                    <td class="py-3 px-4 flex justify-center items-center space-x-5">
                                        <!-- View Icon -->
                                        <button onclick="openModal('ViewModal')" class="text-blue-500 hover:text-blue-700">
                                            <i class="fa fa-eye w-5 h-5"></i>
                                        </button>
                                        <!-- Edit Icon -->
                                        <button onclick="openModal('EditModal')" class="text-gray-600 hover:text-gray-800">
                                            <i class="fa fa-pencil-alt w-5 h-5"></i>
                                        </button>
                                        <!-- Delete Icon -->
                                        <button onclick="openModal('DeleteModal')" class="text-red-600 hover:text-gray-800">
                                            <i class="fa fa-trash-alt w-5 h-5"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Repeat for other rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error Messages -->
        @if ($errors->any())
        <div class="text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- New Member Modal -->
        <div id="NewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white p-7 rounded-lg shadow-md w-[60%] ml-[20%] mt-20">
                <h2 class="text-xl font-semibold mb-4">Add New Employee</h2>

                <form id="newEmployeeForm" method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name Section (Inline: First Name, Middle Name, Last Name) -->
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="text-sm text-gray-600">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" placeholder="Althea Amor"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="firstName"
                                required>
                            <p id="firstNameError" class="text-red-500 text-sm hidden">First Name is required.</p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Middle Name <span class="text-red-500">*</span></label>
                            <input type="text" name="middle_name" placeholder="J"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="middleName"
                                required>
                            <p id="middleNameError" class="text-red-500 text-sm hidden">Middle Name is required.</p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" placeholder="Asis"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="lastName"
                                required>
                            <p id="lastNameError" class="text-red-500 text-sm hidden">Last Name is required.</p>
                        </div>
                    </div>

                    <!-- Username, Email, and Password -->
                    <div class="space-y-4 mb-4">
        

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" placeholder="Enter your email" id="email" required
                                class="w-full mt-1 border border-[#011B33] rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <p id="emailError" class="text-red-500 text-sm hidden">Email is required.</p>
                            <p id="emailErrorInvalid" class="text-red-500 text-sm hidden error-message">Please enter a
                                valid email address.</p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password" placeholder="Enter a secure password"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="password"
                                required>
                            <p id="passwordError" class="text-red-500 text-sm hidden">Password is required.</p>
                        </div>
                        
                        <div>
                            <label class="text-sm text-gray-600">Confirm Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" placeholder="Confirm your password"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="confirmPassword" required>
                            <p id="confirmPasswordError" class="text-red-500 text-sm hidden">Confirm Password is required.</p>
                        </div>
                    </div>

                    <!-- Phone No., Date of Birth, Address, and Photo Upload Section -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <!-- Left Side -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm text-gray-600">Phone No. <span class="text-red-500">*</span></label>
                                <input type="text" name="phone_no" placeholder="+639123456789"
                                    class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="phoneNo"
                                    required>
                                <p id="phoneNoError" class="text-red-500 text-sm hidden">Phone No. is required.</p>
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Date of Birth <span
                                        class="text-red-500">*</span></label>
                                <input type="date" name="date_of_birth"
                                    class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="dob"
                                    required>
                                <p id="dobError" class="text-red-500 text-sm hidden">Date of Birth is required.</p>
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Address <span class="text-red-500">*</span></label>
                                <textarea name="address" placeholder="Enter address here"
                                    class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" rows="3" id="address" required></textarea>
                                <p id="addressError" class="text-red-500 text-sm hidden">Address is required.</p>
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-semibold text-gray-700">Upload Photo</label>
                                <input type="file" name="photo" id="uploadPhoto" accept="image/*"
                                    class="w-full mt-1 px-3 py-2 border rounded">
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Employee Type <span
                                        class="text-red-500">*</span></label>
                                <select name="employee_type"
                                    class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800"
                                    id="employeeType" required>
                                    <option value="">Select Employee Type</option>
                                    <option value="security">Security</option>
                                    <option value="janitor">Janitor</option>
                                    <option value="technician">Technician</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="library_admin">Library Admin</option>
                                </select>
                                <p id="employeeTypeError" class="text-red-500 text-sm hidden">Employee Type is required.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal('NewModal')"
                            class="mr-2 px-3 py-1 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-[#011B33]">Save</button>
                    </div>
                </form>
            </div>
        </div>







        <!-- View Modal -->
        <div id="ViewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white p-7 rounded-lg shadow-md w-[60%] ml-[20%] mt-20">
                <!-- Modal Header with Close Button -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">View Employee Details</h2>
                    <button onclick="closeModal('ViewModal')"
                        class="text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
                </div>

                <!-- Employee Details and Photo Section -->
                <div class="flex justify-between mb-4">
                    <!-- Left Side: Employee Details -->
                    <div class="w-1/2 pr-4">
                        <dl class="space-y-2">
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">First Name</dt>
                                <dd class="text-sm text-gray-900">Althea</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Middle Name</dt>
                                <dd class="text-sm text-gray-900">Jacinto</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Last Name</dt>
                                <dd class="text-sm text-gray-900">Asis</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Phone No.</dt>
                                <dd class="text-sm text-gray-900">+639123456789</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                                <dd class="text-sm text-gray-900">03-02-2004</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Address</dt>
                                <dd class="text-sm text-gray-900">210 sto. nino st. brgy holy spirit</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="text-sm text-gray-900">altheaamor12@gmail.com</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Joined</dt>
                                <dd class="text-sm text-gray-900">2024-10-27 11:50:52</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Modified</dt>
                                <dd class="text-sm text-gray-900">2024-10-27 11:50:52</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Right Side: Photo Upload Section -->
                    <div class="w-1/2 pl-4">
                        <div class="w-48 h-48 flex items-center justify-center mx-auto mb-4">
                            <img src="./images/photo.png" alt="photo" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Edit Modal -->
        <div id="EditModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white p-7 rounded-lg shadow-md w-[60%] ml-[20%] mt-20">
                <h2 class="text-xl font-semibold mb-4">Edit Employee Info</h2>

                <form id="EditEmployeeForm" onsubmit="return validateForm()">
                    <!-- Name Section (Inline: First Name, Middle Name, Last Name) -->
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="text-sm text-gray-600">First Name <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="Althea Amor"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="firstName"
                                required>
                            <p id="firstNameError" class="text-red-500 text-sm hidden">First Name is required.</p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Middle Name <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="J"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="middleName"
                                required>
                            <p id="middleNameError" class="text-red-500 text-sm hidden">Middle Name is required.</p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="Asis"
                                class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="lastName"
                                required>
                            <p id="lastNameError" class="text-red-500 text-sm hidden">Last Name is required.</p>
                        </div>
                    </div>

                    <!-- Phone No., Date of Birth, Email, and Address Section (Left Side) -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <!-- Left Side -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm text-gray-600">Phone No. <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="+639123456789"
                                    class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="phoneNo"
                                    required>
                                <p id="phoneNoError" class="text-red-500 text-sm hidden">Phone No. is required.</p>
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Date of Birth <span
                                        class="text-red-500">*</span></label>
                                <input type="date"
                                    class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="dob"
                                    required>
                                <p id="dobError" class="text-red-500 text-sm hidden">Date of Birth is required.</p>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email <span
                                        class="text-red-500">*</span></label>
                                <input type="email" placeholder="Enter your email" id="email" name="email"
                                    required
                                    class="w-full mt-1 border border-[#011B33] rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <p id="emailError" class="text-red-500 text-sm hidden">Email is required.</p>
                                <p id="emailErrorInvalid" class="text-red-500 text-sm hidden error-message">Please enter a
                                    valid email address.</p>
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Address <span class="text-red-500">*</span></label>
                                <textarea placeholder="Enter address here" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800"
                                    rows="3" id="address" required></textarea>
                                <p id="addressError" class="text-red-500 text-sm hidden">Address is required.</p>
                            </div>
                        </div>

                        <!-- Right Side (Photo Upload Section) -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-semibold text-gray-700">Upload Photo</label>
                                <!-- Photo Upload Input (Larger Image) -->
                                <div class="w-48 h-48 flex items-center justify-center mx-auto mb-4">
                                    <img src="./images/photo.png" alt="photo" class="w-full h-full object-cover">
                                </div>
                                <!-- File Upload Input (Block Format) -->
                                <input type="file" id="uploadPhoto" name="photo" accept="image/*"
                                    class="w-full mt-1 px-3 py-2 border rounded">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Modal Footer -->
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('EditModal')"
                        class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-[#011B33]">Save</button>
                </div>
            </div>
        </div>



        <!-- Delete Modal -->
        <div id="DeleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-md w-[60%] max-w-sm">
                <h1 class="text-2xl font-semibold text-center mb-6">Are you sure you want to DELETE this employee?</h1>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('DeleteModal')"
                        class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">Cancel</button>

                    <!-- Delete Button with Icon -->
                    <button type="submit"
                        class="flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-[#011B33]">
                        <i class="fas fa-trash-alt mr-2"></i> Delete
                    </button>
                </div>
            </div>
        </div>

    @endauth
</x-admin>

{{-- <script>
    // Function to open a modal by ID
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden'); // Remove the hidden class
            modal.classList.add('flex'); // Add the flex class to display the modal
        }
    }

    // Function to close a modal by ID
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden'); // Add the hidden class to hide the modal
            modal.classList.remove('flex'); // Remove the flex class
        }
    }

    //New Modal validations
    // Form Validation
    function validateForm() {
        let isValid = true;

        // Check required fields
        const firstName = document.getElementById('firstName');
        const middleName = document.getElementById('middleName');
        const lastName = document.getElementById('lastName');
        const phoneNo = document.getElementById('phoneNo');
        const dob = document.getElementById('dob');
        const email = document.getElementById('email');
        const address = document.getElementById('address');

        // First Name Validation
        if (firstName.value.trim() === "") {
            document.getElementById('firstNameError').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('firstNameError').classList.add('hidden');
        }

        // Middle Name Validation
        if (middleName.value.trim() === "") {
            document.getElementById('middleNameError').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('middleNameError').classList.add('hidden');
        }

        // Last Name Validation
        if (lastName.value.trim() === "") {
            document.getElementById('lastNameError').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('lastNameError').classList.add('hidden');
        }

        // Phone No. Validation
        if (phoneNo.value.trim() === "") {
            document.getElementById('phoneNoError').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('phoneNoError').classList.add('hidden');
        }

        // Date of Birth Validation
        if (dob.value.trim() === "") {
            document.getElementById('dobError').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('dobError').classList.add('hidden');
        }

        // Email Validation
        if (email.value.trim() === "") {
            document.getElementById('emailError').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('emailError').classList.add('hidden');
        }

        // Email Format Validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email.value.trim())) {
            document.getElementById('emailErrorInvalid').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('emailErrorInvalid').classList.add('hidden');
        }

        // Address Validation
        if (address.value.trim() === "") {
            document.getElementById('addressError').classList.remove('hidden');
            isValid = false;
        } else {
            document.getElementById('addressError').classList.add('hidden');
        }

        return isValid;
    }
</script> --}}
