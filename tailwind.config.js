/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["app/view/**/*.{php,js}"],
  theme: {
    extend: {
      colors: {
        "brown-cream": "#804000",
        "brown-cream-opacitiy": "#80400094",
        "brown-cream-opacitiy-v2": "#592d01",
        "white-cream": "#ededed",
        "brown-cream-v2": "#9e6730",
        "brown-cream-v3": "#e7b295",
        50: "#eff6ff",
        100: "#dbeafe",
        200: "#bfdbfe",
        300: "#93c5fd",
        400: "#60a5fa",
        500: "#3b82f6",
        600: "#2563eb",
        700: "#1d4ed8",
        800: "#1e40af",
        900: "#1e3a8a",
        invalid: '#e53e3e', // Por ejemplo, un color rojo para mostrar un campo como inválido
        valid: '#38a169',   // Por ejemplo, un color verde para mostrar un campo como válido
      },
      borderColor: theme => ({
        // Agregar colores para los bordes de las clases "invalid" y "valid"
        invalid: theme('colors.invalid'),
        valid: theme('colors.valid'),
      }),
    },
  },
  variants: {
    backgroundColor: ["responsive", "hover", "focus", "invalid"],
    borderColor: ["responsive", "hover", "focus", "invalid"],
  },
  plugins: [require("tailwindcss-invalid-variant-plugin")],
};
