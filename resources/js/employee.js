// Ensure the DOM is fully loaded before running the script
document.addEventListener('DOMContentLoaded', () => {
    // Function to open a modal by ID
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden'); // Remove the hidden class
            modal.classList.add('flex'); // Add the flex class to display the modal
            modal.setAttribute('aria-hidden', 'false'); // Accessibility: Modal is visible
        } else {
            console.error(`Modal with ID '${modalId}' not found.`);
        }
    }

    // Function to close a modal by ID
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden'); // Add the hidden class to hide the modal
            modal.classList.remove('flex'); // Remove the flex class
            modal.setAttribute('aria-hidden', 'true'); // Accessibility: Modal is hidden
        } else {
            console.error(`Modal with ID '${modalId}' not found.`);
        }
    }

    // Accessibility: Close modals on pressing the Escape key
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            const openModals = document.querySelectorAll('.modal.flex');
            openModals.forEach((modal) => closeModal(modal.id));
        }
    });

    // Form Validation
    function validateForm() {
        let isValid = true;

        // Define field IDs and corresponding error message IDs
        const fields = [
            { id: 'firstName', errorId: 'firstNameError', errorMsg: 'First name is required.' },
            { id: 'middleName', errorId: 'middleNameError', errorMsg: 'Middle name is required.' },
            { id: 'lastName', errorId: 'lastNameError', errorMsg: 'Last name is required.' },
            { id: 'phoneNo', errorId: 'phoneNoError', errorMsg: 'Phone number is required.' },
            { id: 'dob', errorId: 'dobError', errorMsg: 'Date of birth is required.' },
            { id: 'email', errorId: 'emailError', errorMsg: 'Email is required.' },
            { id: 'address', errorId: 'addressError', errorMsg: 'Address is required.' },
        ];

        // Loop through fields to validate each
        fields.forEach(({ id, errorId, errorMsg }) => {
            const field = document.getElementById(id);
            const errorElement = document.getElementById(errorId);

            if (field && errorElement) {
                if (field.value.trim() === '') {
                    errorElement.textContent = errorMsg;
                    errorElement.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorElement.textContent = '';
                    errorElement.classList.add('hidden');
                }
            } else {
                console.error(`Field or error element with ID '${id}' or '${errorId}' not found.`);
            }
        });

        // Validate email format
        const email = document.getElementById('email');
        const emailErrorInvalid = document.getElementById('emailErrorInvalid');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && emailErrorInvalid) {
            if (email.value.trim() !== '' && !emailPattern.test(email.value.trim())) {
                emailErrorInvalid.textContent = 'Invalid email format.';
                emailErrorInvalid.classList.remove('hidden');
                isValid = false;
            } else {
                emailErrorInvalid.textContent = '';
                emailErrorInvalid.classList.add('hidden');
            }
        }

        return isValid;
    }

    // Attach event listeners for modals and form submission
    const openButtons = document.querySelectorAll('[data-modal-open]');
    const closeButtons = document.querySelectorAll('[data-modal-close]');

    // Open modal buttons
    openButtons.forEach((button) => {
        const targetModal = button.getAttribute('data-modal-open');
        button.addEventListener('click', () => openModal(targetModal));
    });

    // Close modal buttons
    closeButtons.forEach((button) => {
        const targetModal = button.getAttribute('data-modal-close');
        button.addEventListener('click', () => closeModal(targetModal));
    });

    // Form validation on submit
    const form = document.querySelector('form'); // Replace with the correct form selector if needed
    if (form) {
        form.addEventListener('submit', (event) => {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    }
});
