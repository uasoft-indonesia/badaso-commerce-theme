module.exports = {
  purge: [
    './packages/badaso/commerce-theme/src/resources/**/*.vue',
    './packages/badaso/commerce-theme/src/resources/**/*.js',
    './packages/badaso/commerce-theme/src/resources/views/**/*.php',
    './storage/framework/views/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      borderRadius: {
        '3': '3px'
      },
      colors: {
        primary: '#06bbd3',
        gray: {
          800: '#1f2937'
        }
      },
      height: {
        '22': '88px',
        max: 'max-content',
        min: 'min-content',
        'auth': 'calc(100vh - 48px)',
      },
      gridTemplateColumns: {
        'profile': '200px 1fr',
        'profile-content': '150px 1fr',
        'my-address': '1fr 250px',
        'change-password': '200px 1fr',
      },
      inset: {
        'arrow-right': 'calc(89% - 10px) !important',
        'arrow-center': 'calc(50% - 10px) !important',
        'arrow-left': 'calc(11% - 10px) !important',
        '18': '68px'
      },
      spacing: {
        '15': '60px'
      },
      zIndex: {
        '-1': '-1',
        '60': '60',
        '70': '70',
        '80': '80',
        '90': '90',
        '100': '100',
      },
      maxWidth: {
        32: '8rem',
        52: '13rem',
      }
    },
    container: {
      center: true,
      screens: {
        DEFAULT: '100%',
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1200px',
        '2xl': '1200px',
      },
    },
    tooltipArrows: theme => ({
      'arrow': {
        borderColor: theme('colors.gray.200'),
        borderWidth: 1,
        backgroundColor: theme('colors.white'),
        size: 10,
        offset: 10,
      },
      'navigation-arrow': {
        borderColor: theme('colors.gray.200'),
        borderWidth: 1,
        backgroundColor: theme('colors.white'),
        size: 10,
        offset: 330,
      },
    }),
  },
  variants: {
    extend: {
      backgroundColor: ['responsive', 'dark', 'group-hover', 'focus-within', 'hover', 'focus', 'disabled', 'important'],
      brightness: ['hover', 'focus'],
      borderCollapse: ['responsive'],
      borderColor: ['responsive', 'dark', 'group-hover', 'focus-within', 'hover', 'focus', 'first', 'last'],
      borderOpacity: ['responsive', 'dark', 'group-hover', 'focus-within', 'hover', 'focus'],
      borderRadius: ['responsive', 'hover', 'group-hover', 'first', 'last'],
      borderStyle: ['responsive'],
      borderWidth: ['responsive', 'first', 'last'],
      boxShadow: ['responsive', 'group-hover', 'focus-within', 'hover', 'focus', 'disabled'],
      cursor: ['responsive', 'disabled'],
      display: ['responsive', 'hover', 'group-hover', 'first', 'last'],
      inset: ['hover', 'focus', 'important'],
      margin: ['responsive', 'first', 'last'],
      opacity: ['responsive', 'group-hover', 'focus-within', 'hover', 'focus', 'disabled'],
      padding: ['responsive', 'first', 'last'],
      position: ['responsive', 'important'],
      ringWidth: ['hover', 'group-hover'],
      textColor: ['responsive', 'dark', 'group-hover', 'focus-within', 'hover', 'focus', 'disabled'],
      userSelect: ['responsive', 'disabled'],
      visibility: ['responsive', 'hover', 'group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/forms')({ strategy: 'class' }),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
    require('tailwindcss-debug-screens'),
    require('tailwindcss-tooltip-arrow-after')(),
    require('tailwindcss-important')(),
  ],
}
