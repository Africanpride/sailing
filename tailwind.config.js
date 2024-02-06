import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            backgroundImage: {
                'hero-pattern': 'url( /public/images/main/hero-pattern.svg)',
                'hero-pattern-dark': 'url( /public/images/main/hero-pattern-dark.svg)'
            },
            fontFamily: {
                sans: ['Open Sans', 'source sans pro', 'montserrat', 'inter', 'anton', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xs: ['10px', '20px'],
                sm: ['12px', '20px'],
                md: ['14px', '20px'],
                base: ['16px', '20px'],
                lg: ['16px', '20px'],
                xl: ['24px', '32px'],
            },
            colors: {

                firefly: {
                    50: '#f2f9fd',
                    100: '#e4f1fa',
                    200: '#c4e2f3',
                    300: '#90cae9',
                    400: '#54b0dc',
                    500: '#2e96c9',
                    600: '#1f79aa',
                    700: '#1a608a',
                    800: '#1a5172',
                    900: '#0a1a24',
                },
            },
        },
    },
    variants: {
        scrollbar: ['rounded']
    },
    plugins: [
        require('preline/plugin'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require("tailwindcss-animate"),
        require('tailwind-scrollbar'),

    ],


};
