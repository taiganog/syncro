const colors = require('tailwindcss/colors');

// Palette: ["#9e0142","#d8434e","#f67b4a","#fdbf6f","#feeea2","#f1f9a9","#bfe5a0","#75c8a5","#388eba","#5e4fa2"]

module.exports = {
  theme: {
    extend: {
      colors: {
        // Cinza com leve subtom violeta — harmoniza com todo o espectro quente→frio da paleta
        primary: {
          50:  '#f6f6fa',
          100: '#eeeef4',
          200: '#d9d9e8',
          300: '#b8b8d0',
          400: '#9090b2',
          500: '#70708e',
          600: '#585872',
          700: '#46465c',
          800: '#3b3b4e',
          900: '#333344',
          950: '#1e1e2c',
        },

        danger: {
          DEFAULT: '#d8434e', // #2
          dark:    '#9e0142', // #1
        },
        warning: {
          DEFAULT: '#fdbf6f', // #4
          dark:    '#f67b4a', // #3
        },
        caution: '#feeea2',   // #5
        notice:  '#f1f9a9',   // #6
        success: {
          DEFAULT: '#75c8a5', // #8
          light:   '#bfe5a0', // #7
        },
        info:   '#388eba',    // #9
        accent: '#5e4fa2',    // #10
      },
    },
  },
}
