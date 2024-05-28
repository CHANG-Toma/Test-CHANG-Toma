// tailwind.config.js
module.exports = {
  content: [
    './templates/**/*.html.twig',
    './assets/**/*.js',
    './assets/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
};