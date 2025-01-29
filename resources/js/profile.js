

        document.addEventListener('DOMContentLoaded', () => {
                // Function to open a modal by ID
                window.openModal = function(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                modal.classList.remove('hidden'); // Remove the hidden class
                modal.classList.add('flex'); // Add the flex class to display the modal
                modal.setAttribute('aria-hidden', 'false'); // Ensure accessibility
                } else {
                console.error(`Modal with ID '${modalId}' not found.`);
                }
        };

                // Function to close a modal by ID
                window.closeModal = function(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                modal.classList.add('hidden'); // Add the hidden class to hide the modal
                modal.classList.remove('flex'); // Remove the flex class
                modal.setAttribute('aria-hidden', 'true'); // Ensure accessibility
                } else {
                console.error(`Modal with ID '${modalId}' not found.`);
                }
        };
        });
















        // ORIGINAL CODE
        // // Function to open a modal by ID
        // function openModal(modalId) {
        // const modal = document.getElementById(modalId);
        // if (modal) {
        //         modal.classList.remove('hidden'); // Remove the hidden class
        //         modal.classList.add('flex'); // Add the flex class to display the modal
        // }
        // }

        // // Function to close a modal by ID
        // function closeModal(modalId) {
        // const modal = document.getElementById(modalId);
        // if (modal) {
        //         modal.classList.add('hidden'); // Add the hidden class to hide the modal
        //         modal.classList.remove('flex'); // Remove the flex class
        // }
        // }

