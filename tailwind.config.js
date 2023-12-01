/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './Resources/Views/Pages/**/*.{html,js,php}',
    './Resources/Views/Components/**/*.{html,js,php}',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Roboto', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/typography'),
    require('flowbite/plugin'),
  ],
}

