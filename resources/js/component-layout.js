// Highlight the active sidebar item based on URL
document.addEventListener('DOMContentLoaded', () => {
    const currentUrl = window.location.pathname;
    const sidebarLinks = document.querySelectorAll('.sidebar-item');

    sidebarLinks.forEach(link => {
        // Remove the active class and background color from all links
        link.classList.remove('active', 'bg-[#22C55E]');
        
        // Apply text-white to all links to ensure they are white by default
        link.classList.add('text-white');

        // Check if the current URL matches the link's href attribute
        if (link.getAttribute('href') === currentUrl) {
            link.classList.add('active', 'bg-[#22C55E]'); // Highlight active link
        }
    });

    // Set default active link if no match is found
    if (currentUrl === '/') {
        document.getElementById('login').classList.add('active', 'bg-[#22C55E]'); // Highlight "Login" by default
    }
});