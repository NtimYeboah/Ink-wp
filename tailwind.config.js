const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        extend: {
            container: {
                center: true,

                /* From tailpress */
                padding: {
                    DEFAULT: '1rem',
                    sm: '2rem',
                    lg: '0rem'
                },
            },
            fontFamily: {
                'saira': ['"Saira Condensed"', ...defaultTheme.fontFamily.serif],
                'sarabun': ['Sarabun', ...defaultTheme.fontFamily.sans]
            },
            backgroundSize: {
                '50%': '50%',
            },
        },

        /* From tailpress */
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': tailpress.theme('settings.layout.contentSize', theme),
            'xl': tailpress.theme('settings.layout.wideSize', theme),
            '2xl': '1440px'
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        tailpress.tailwind
    ],
};
