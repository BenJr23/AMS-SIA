import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/js/app.js',
                    'resources/js/employee.js',
                    'resources/js/home.js',
                    'resources/js/profile.js',
                    'resources/js/reports.js',
                    'resources/js/settings.js',

                    'resources/js/clocking.js',
                    'resources/js/guest.js',
                    'resources/js/guest-clocking.js',
                    'resources/js/login.js',

                    'resources/js/component-admin.js',
                    'resources/js/component-layout.js',
                    
                    'resources/js/deadguestclocking.js',
                    'resources/js/guestclockingform.js',

                    'resources/js/clockingform.js',
                
                ],
            refresh: true,
        }),
    ],
});
