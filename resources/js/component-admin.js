
// Ensure DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Highlight active sidebar link
    const currentPath = window.location.pathname;
    const sidebarLinks = document.querySelectorAll('.sidebar-item');

    sidebarLinks.forEach(link => link.classList.remove('bg-[#13684C]'));

    if (currentPath === '/dashboard' || currentPath === '/') {
        document.getElementById('dashboard-link')?.classList.add('bg-[#13684C]');
    } else {
        sidebarLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('bg-[#13684C]');
            }
        });
    }

    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            sidebarLinks.forEach(link => link.classList.remove('bg-[#13684C]'));
            this.classList.add('bg-[#13684C]');
        });
    });

    // Toggle sidebar visibility
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const sidebar = document.querySelector('.sidebar');
    hamburgerBtn?.addEventListener('click', () => {
        sidebar?.classList.toggle('-translate-x-full');
    });

    // Modal functionality
    const logoutLink = document.getElementById('logout-link');
    const cancelButton = document.querySelector('#LogoutModal button');

    logoutLink?.addEventListener('click', (event) => {
        event.preventDefault();
        openModal('LogoutModal');
    });

    cancelButton?.addEventListener('click', () => {
        closeModal('LogoutModal');
    });

    // Notification dropdown toggle
    const notificationIcon = document.getElementById('notificationIcon');
    const notificationBox = document.getElementById('notificationBox');
    notificationIcon?.addEventListener('click', () => {
        notificationBox?.classList.toggle('hidden');
    });
});

// Function to open a modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
}

// Function to close a modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}


// // Function to toggle the sidebar visibility
//     // Get the current path
//     const currentPath = window.location.pathname;
    
//     // Select all sidebar links
//     const sidebarLinks = document.querySelectorAll('.sidebar-item');
    
//     // Remove highlight from all sidebar links
//     sidebarLinks.forEach(link => {
//         link.classList.remove('bg-[#13684C]');  // Remove the highlight class from all links
//     });

//     // Set default active state for '/dashboard' or root '/'
//     if (currentPath === '/dashboard' || currentPath === '/') {
//         document.getElementById('dashboard-link').classList.add('bg-[#13684C]'); // Highlight the Dashboard link by default
//     } else {
//         // Highlight the active link based on the current path
//         sidebarLinks.forEach(link => {
//             if (link.getAttribute('href') === currentPath) {
//                 link.classList.add('bg-[#13684C]');  // Add highlight to the active link
//             }
//         });
//     }

//     // Add event listener to update the active link on click
//     sidebarLinks.forEach(link => {
//         link.addEventListener('click', function() {
//             sidebarLinks.forEach(link => link.classList.remove('bg-[#13684C]')); // Remove highlight from all
//             this.classList.add('bg-[#13684C]');  // Add highlight to clicked link
//         });
//     });

//     // Toggle the sidebar visibility when hamburger button is clicked
//     document.getElementById('hamburger-btn').addEventListener('click', function() {
//         const sidebar = document.querySelector('.sidebar');
//         sidebar.classList.toggle('-translate-x-full');
//     });


//     //for the logout modal
//     // Function to open a modal by ID
//     function openModal(modalId) {
//     const modal = document.getElementById(modalId);
//     if (modal) {
//             modal.classList.remove('hidden'); // Remove the hidden class
//             modal.classList.add('flex'); // Add the flex class to display the modal
//     }
//     }

//     // Function to close a modal by ID
//     function closeModal(modalId) {
//     const modal = document.getElementById(modalId);
//     if (modal) {
//             modal.classList.add('hidden'); // Add the hidden class to hide the modal
//             modal.classList.remove('flex'); // Remove the flex class
//     }
//     }

//         // Toggle notification dropdown
//         const notificationIcon = document.getElementById('notificationIcon');
//     const notificationBox = document.getElementById('notificationBox');
//     notificationIcon.addEventListener('click', () => {
//         notificationBox.classList.toggle('hidden');
//     });

//     const mobileNotificationIcon = document.getElementById('mobileNotificationIcon');
//     const mobileNotificationBox = document.getElementById('mobileNotificationBox');
//     mobileNotificationIcon.addEventListener('click', () => {
//         mobileNotificationBox.classList.toggle('hidden');
//     });
