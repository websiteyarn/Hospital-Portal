/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        "custom-color": "#F1FCFD", // bg-custom-color
        "side-navbar": "#3D98AA", // bg-side-navbar
        "side-navbar-active-text": "#3D98AA", // text-side-navbar-active-text
        "search-bar": "#2EB9B9", // bg-search-bar
        "gray-text": "#5C5C5C", // text-gray-text
        "sidebar-text-bold": "#246673", // text-sidebar-text-bold
        "save-button": "#FFC300", // bg-save-button
        "form-fill": "#F8F8F8", // bg-change-password-fill
        "background-inactive": "#F5F5F5", // bg-background-inactive
        "appointment-date": "#FF9900", // text-appointment-date
        "custom-time": "#757575", // text-custom-time
        "time-active": "#C1FF72", // text-time-active
        "login-font-clr": "#68E3EA", // text-login-font-clr
        "doctor-convo-border": "#60BFF0", // border-doctor-convo-border
        "user-convo-bg": "#C7EBFE", // bg-user-convo-bg
        "orange-text": "#FF9900", // text-orange-text
        "blue-text": "#3D98AA", // text-blue-text
        "delete-btn": "#A01D00", // bg-delete-btn
      },
      fontFamily: {
        Commissioner: ["Commissioner", "sans-serif"],
      },
      boxShadow: {
        'custom': '0px 4px 20px rgba(0, 0, 0, 0.15)',
      },
    },
  },
  plugins: [],
}