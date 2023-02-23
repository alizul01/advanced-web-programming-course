/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
    ],
    theme: {
      extend: {
        colors: {
            'primary': '#fee6e3',
        }
      },
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
    ],
  }
