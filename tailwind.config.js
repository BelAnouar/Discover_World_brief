/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.{html,js,blade.php,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

