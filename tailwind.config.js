/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php"],
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
