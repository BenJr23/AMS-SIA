

    // Highlight the active sidebar item based on URL
    document.addEventListener('DOMContentLoaded', () => {
        const currentUrl = window.location.pathname;
        const sidebarLinks = document.querySelectorAll('.sidebar-item');

        sidebarLinks.forEach(link => {
            if (link.getAttribute('href') === currentUrl) {
                link.classList.add('active', 'text-white', 'bg-[#22C55E]');
            }
        });
    });