import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
        'resources/css/app.css',
        'resources/css/slide.css',
        'resources/assets/css/style.css',
        'resources/assets/js/app.js',
        'resources/css/style.css',
        'resources/assets/css/style.css',
        'resources/css/model.css',
        'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});