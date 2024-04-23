import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/sb-admin/css/styles.css',
                'resources/sb-admin/js/scripts.js',
                'resources/sb-admin/assets/demo/chart-area-demo.js',
                'resources/sb-admin/assets/demo/chart-bar-demo.js',
                'resources/sb-admin/assets/demo/chart-pie-demo.js',
            ],
            refresh: true,
        }),
    ],
});
