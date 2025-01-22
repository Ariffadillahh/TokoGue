/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                "primary": '#969D43',
                "secondary" : '#C8D439'
              },
        },
    },
    plugins: [ require("daisyui")],
};
