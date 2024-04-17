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
                    950: '#051217'
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
        require('tailwindcss-animate'),
        require('tailwind-scrollbar'),
        require("postcss-obfuscator")({
                enable: true, // Enable plugin
                length: 5, // Random  name length.
                classMethod: "random", // 'random', 'simple', 'none' obfuscation method for classes.
                classPrefix: "", // ClassName prefix.
                classSuffix: "", // ClassName suffix.
                classIgnore: [], // Class to ignore from obfuscation.
                ids: false, //  Obfuscate #IdNames.
                idMethod: "random", // 'random', 'simple', 'none' obfuscation method for ids .
                idPrefix: "", // idName Prefix.
                idSuffix: "", // idName suffix.
                idIgnore: [], // Ids to ignore from obfuscation.
                indicatorStart: null, // Identify ids & classes by the preceding string.
                indicatorEnd: null, // Identify ids & classes by the following string.  
                jsonsPath: "css-obfuscator", // Path and file name where to save obfuscation data.
                srcPath: "src", // Source of your files.
                desPath: "out", // Destination for obfuscated html/js/.. files.Be careful using the same directory as your src(you will lose your original files).
                extensions: [".html"], // Extesnion of files you want osbfucated ['.html', '.php', '.js', '.svelte'].
                htmlExcludes: [], // Files and paths to exclude from html obfuscation replacement.
                cssExcludes: [], // Files and paths to exclude from css obfuscation.
                fresh: false, // Create new obfuscation data list or use already existed one (to keep production cache or prevent data scrapping).
                multi: false, // Generate obsfucated data file for each css file.
                differMulti: false, // Generate different Random names for each file.
                formatJson: false, // Format obfuscation data JSON file.
                showConfig: false, // Show config on terminal when runinng.
                keepData: true, // Keep or delete Data after obfuscation is finished?
                preRun: () => Promise.resolve(), // do something before the plugin runs.
                callBack: function () {}, // Callback function to call after obfuscation is done.
        
          }),

    ],


};
