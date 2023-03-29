module.exports = {
  plugins: [],
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./nuxt.config.{js,ts}",
  ],
  important: false,
  safelist: [
    {
      pattern: /text-(slate|gray|stone)-(500|600|700|800|900)/,
    },
    {
      pattern: /text-(sm|md|lg|xl|base)/,
    },
    {
      pattern: /font-(thin|light|normal|medium|semibold|bold)/,
    },
  ],
};
