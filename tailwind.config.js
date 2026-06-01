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
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    blue: '#2563EB',
                    'blue-dark': '#0A1F6E',
                    'blue-mid': '#1A3FA8',
                    'blue-light': '#EFF6FF',
                    grey: '#666666',
                    'grey-dark': '#333333',
                },
            },
        },
    },

    plugins: [forms],
};
