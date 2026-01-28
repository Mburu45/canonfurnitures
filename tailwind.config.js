import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'oak-brown': '#5A3E2B',
                'off-white': '#F7F5F2',
                'charcoal': '#2E2E2E',
                'forest-green': '#4F6F52',
                'dark-oak': '#3F2A1D',
            },
            fontFamily: {
                sans: ['Inter', 'Roboto', 'Open Sans', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', 'Merriweather', ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms],
};
