import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    50: '#eff9ff',
                    100: '#dff2ff',
                    200: '#b8e6ff',
                    300: '#7ad4ff',
                    400: '#33bdff',
                    500: '#09a3f5',
                    600: '#0082d1',
                    700: '#0167a8',
                    800: '#06578a',
                    900: '#0b4972',
                    950: '#072e4c',
                },
            },
        },
    },

    plugins: [forms],
};
