const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
const { gray } = require('tailwindcss/colors');

module.exports = {
  purge: [
    'public/**/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
        sche: ['Amiri', 'Scheherazade', 'Roboto'],
        roboto: ['Roboto', ...defaultTheme.fontFamily.serif],
        amiri: ['Amiri', 'Scheherazade', 'Roboto'],
      },
      colors: {
          transparent: 'transparent',
          primary: colors.blue[500],
          "primary-hover": colors.blue[700],
          secondary: '#666633',
          "secondary-hover": '#999933',
          success: colors.green[500],
          "success-hover": colors.green[700],
          danger: colors.red[500],
          "danger-hover": colors.red[700],
          warning: colors.yellow[500],
          "warning-hover": colors.yellow[700],
          info: colors.cyan[400],
          "info-hover": colors.cyan[600],
          light: colors.gray[200],
          "light-hover": colors.gray[300],
          dark: colors.gray[800],
          "dark-hover": colors.gray[700],
          white: colors.white,
          black: colors.black,
          // Admin layout colors
          headerBg: colors.gray[500],
          headerText: colors.black,
          siteBg: colors.white,
          siteText: colors.gray[800],
          // Old
          'navigation-bg': colors.gray[400],
          'navigation-text': colors.black,
          'home-box-text': colors.gray[200],
          'menu': '#3CB371',
          'text': colors.white,
          'paper': colors.yellow[50],

      },
      inset: {
          'screen-1/3': '33vh',
      },
      height: {
          'screen-1/3': '33vh',
          'screen-1/5': '20vh',
          'screen-1/10': '10vh',
          'screen-3/10': '30vh',
          'screen-7/10': '70vh',
          'screen-3/4': '75vh',
          'screen-8/10': '80vh',
          'screen-9/10': '90vh',
          'screen-2/12': '16.66666667vh',
          'screen-8/12': '66.66666667vh',
          'screen-10/12': '83.33333333vh',
      },
      maxWidth: {
          '1/4': '25%',
          '1/3': '33%',
          '1/2': '50%',
          '2/3': '66%',
          '3/4': '75%',
          '0':	'0px',
          '0.5': '0.125rem',
          '1': '0.25rem',
          '1.5': '0.375rem',
          '2': '0.5rem',
          '2.5': '0.625rem',
          '3': '0.75rem',
          '3.5': '0.875rem',
          '4': '1rem',
          '5': '1.25rem',
          '6': '1.50rem',
          '7': '1.75rem',
          '8': '2rem',
          '9': '2.25rem',
          '10': '2.50rem',
          '11': '2.75rem',
          '12': '3rem',
          '13': '3.25rem',
          '14': '3.50rem',
          '16': '4rem',
          '20': '5rem',
          '24': '6rem',
          '28': '7rem',
          '32': '8rem',
          '36': '9rem',
          '40': '10rem',
          '44': '11rem',
          '48': '12rem',
          '52': '13rem',
          '56': '14rem',
          '60': '15rem',
          '64': '16rem',
          '72': '18rem',
          '80': '20rem',
          '96': '24rem',
      },
      minHeight: {
          '1/4': '25%',
          '1/3': '33%',
          '1/2': '50%',
          '2/3': '66%',
          '3/4': '75%',
          '1/4-screen': '25vh',
          '1/3-screen': '33vh',
          '1/2-screen': '50vh',
          '2/3-screen': '66vh',
          '3/4-screen': '75vh',
          '7/10-screen': '70vh',          
          '0.5': '0.125rem',
          '1': '0.25rem',
          '1.5': '0.375rem',
          '2': '0.5rem',
          '2.5': '0.625rem',
          '3': '0.75rem',
          '3.5': '0.875rem',
          '4': '1rem',
          '5': '1.25rem',
          '6': '1.50rem',
          '7': '1.75rem',
          '8': '2rem',
          '9': '2.25rem',
          '10': '2.50rem',
          '11': '2.75rem',
          '12': '3rem',
          '13': '3.25rem',
          '14': '3.50rem',
          '16': '4rem',
          '20': '5rem',
          '24': '6rem',
          '28': '7rem',
          '32': '8rem',
          '36': '9rem',
          '40': '10rem',
          '44': '11rem',
          '48': '12rem',
          '52': '13rem',
          '56': '14rem',
          '60': '15rem',
          '64': '16rem',
          '72': '18rem',
          '80': '20rem',
          '96': '24rem',
      },
      minWidth: {
          '1/4': '25%',
          '1/3': '33%',
          '1/2': '50%',
          '2/3': '66%',
          '3/4': '75%',
          '0':	'0px',
          '0.5': '0.125rem',
          '1': '0.25rem',
          '1.5': '0.375rem',
          '2': '0.5rem',
          '2.5': '0.625rem',
          '3': '0.75rem',
          '3.5': '0.875rem',
          '4': '1rem',
          '5': '1.25rem',
          '6': '1.50rem',
          '7': '1.75rem',
          '8': '2rem',
          '9': '2.25rem',
          '10': '2.50rem',
          '11': '2.75rem',
          '12': '3rem',
          '13': '3.25rem',
          '14': '3.50rem',
          '16': '4rem',
          '20': '5rem',
          '24': '6rem',
          '28': '7rem',
          '32': '8rem',
          '36': '9rem',
          '40': '10rem',
          '44': '11rem',
          '48': '12rem',
          '52': '13rem',
          '56': '14rem',
          '60': '15rem',
          '64': '16rem',
          '72': '18rem',
          '80': '20rem',
          '96': '24rem',
      },
      zIndex: {
          '1000': '1000',
      },
      transitionDuration: {
          '0': '0ms',
          '400': '400ms',
          '600': '600ms',
          '800': '800ms',
          '900': '900ms',
          '1200': '1200ms',
          '1300': '1300ms',
          '1400': '1400ms',
          '1500': '1500ms',
          '1600': '1600ms',
          '1700': '1700ms',
          '1800': '1800ms',
          '1900': '1900ms',
          '2000': '2000ms',
          '2500': '2500ms',
          '3000': '3000ms',
          '3500': '3500ms',
          '4000': '4000ms',
          '4500': '4500ms',
          '5000': '5000ms',
          '7500': '7500ms',
          '10000': '10000ms',
      },
      gridTemplateColumns: {
          // Simple 16 column grid
        '13': 'repeat(13, minmax(0, 1fr))',
        '14': 'repeat(14, minmax(0, 1fr))',

        '15': 'repeat(15, minmax(0, 1fr))',
        '16': 'repeat(16, minmax(0, 1fr))',
        '17': 'repeat(17, minmax(0, 1fr))',
        '18': 'repeat(18, minmax(0, 1fr))',
        '19': 'repeat(19, minmax(0, 1fr))',
        '20': 'repeat(20, minmax(0, 1fr))',

      },
      gridColumn: {
          'span-13': 'span 13 / span 13',
          'span-14': 'span 14 / span 14',
          'span-15': 'span 15 / span 15',
          'span-16': 'span 16 / span 16',
          'span-17': 'span 17 / span 17',
          'span-18': 'span 18 / span 18',
          'span-19': 'span 19 / span 19',
          'span-20': 'span 20 / span 20',
      },
    },
  },
  variants: {
    extend: {
      letterSpacing: ['hover', 'focus'],
    },
  },
  plugins: [],
}