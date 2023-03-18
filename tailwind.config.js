/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
      extend: {
        colors: {
            'primary': {
                '900' : '#FEE6E3',
                '800' : '#FECDC9',
            },
        }
      },
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
        require('tailwindcss-plugins/pagination')
    ],
  }
