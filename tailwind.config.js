/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./pages/**/*.{php,js}"],
  theme: {
    screens: {
      'md': {'min': '640px'},
      'lg': {'min': '1130px'},
    },
    extend: {},
  },
  plugins: [],
}

