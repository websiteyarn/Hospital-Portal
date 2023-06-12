/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        "custom-color": "#F1FCFD", // bg-custom-color
        "side-navbar": "#3D98AA", // bg-side-navbar
        "side-navbar-active-text": "#3D98AA" // text-side-navbar-active-text
      },
      fontFamily: {
        Commissioner: ["Commissioner", "sans-serif"],
      },
    },
  },
  plugins: [],
}