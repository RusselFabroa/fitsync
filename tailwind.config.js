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
                OpenSans: ['Open Sans', 'sans-serif'],
                bebas: ['Bebas Neue', 'sans-serif'],
                montserrat: ['Montserrat', 'sans-serif'],
                poppins: ['Poppins', 'sans-serif'],
                anton: ['Anton', 'sans-serif'],
            },
        },
    },
    plugins: [
        require('flowbite/plugin')({
          charts: true,
          // Add other plugin options if needed
        }),
        forms
    ],
};
