/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                body: "Gilroy",
                heading: "Catamaran",
            },
            colors: {
                dark: "#1a2238",
                light: "#f1f1e6",
                accent: "#f0446b",
            },
        },
    },
    plugins: [],
};
