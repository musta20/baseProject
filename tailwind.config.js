import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/assets/**/*.{woff,woff2,ttf,otf}", // Add the font directory path
    ],

    darkMode: 'class',
    theme: {
        
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                Lateef:['Lateef'],
                IBMPlex:['IBMPlex'],
            },
        },
    },

    plugins: [forms],
};
