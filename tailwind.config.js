/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'cus-black': '#062126'
      },
      animation: {
        "show-toast": "slide-in 0.5s ease forwards",
        "hide-toast": "slide-out 0.5s ease forwards"
      },
      keyframes: {
        "slide-in": {
          "0%": { right: '-320px' },
          "100%": { right: '32px' },
        },
        "slide-out": {
          "0%": { right: '32px' },
          "100%": { right: '-320px' },
        },
      },
    },
  },
  plugins: [],
}