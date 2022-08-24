/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",

        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#6e7bff",
            },
        },
    },
    plugins: [],
    dark: "class",
};
