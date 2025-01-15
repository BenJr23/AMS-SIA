
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden'); // Toggle the 'hidden' class
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
