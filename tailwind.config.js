/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'base': '#e9eafa',
        'berry':'#160d3d',
        'light-berry':'#7c73a3',
        'purple':'#4f2c9a'
      },
      keyframes: {
        'notification-swipe-up': {
          '0%':{ transform: 'translateY(150%)' },
          '100%':{ transform: 'translateY(0)' }
        },
        'notification-swipe-down': {
          '0%':{ transform: 'translateY(0)' },
          '100%':{ transform: 'translateY(150%)' }
        },
        'fade-in': {
          '0%':{ opacity: 0 },
          '100%':{ opacity: 1 }
        },
        'fade-out': {
          '0%':{ opacity: 1 },
          '100%':{ opacity: 0 }
        },
      },
      animation: {
        'notification-swipe-up': 'notification-swipe-up 1s ease-in-out forwards',
        'notification-swipe-down': 'notification-swipe-down .5s ease-in-out forwards',
        'overlay-show': 'fade-in .5s ease-in-out forwards',
        'overlay-hide': 'fade-out .3s ease-in-out forwards',
      }
    },
  },
  plugins: [],
}

