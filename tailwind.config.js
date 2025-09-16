module.exports = {
  content: ["./pages/*.{html,js}", "./index.html", "./js/*.js"],
  theme: {
    extend: {
      colors: {
        primary: "#1A1A2E", // sophisticated-navy
        secondary: "#2C2C2C", // professional-charcoal
        accent: "#D4AF37", // premium-gold
        background: "#FFFFFF", // pure-white
        surface: "#F8F9FA", // subtle-gray
        "text-primary": "#1A1A2E", // sophisticated-navy
        "text-secondary": "#6C757D", // muted-gray
        success: "#28A745", // success-green
        warning: "#FFC107", // warning-amber
        error: "#DC3545", // error-red
        "border-light": "#E5E7EB", // light-gray
        "border-accent": "#D4AF37", // premium-gold
      },
      fontFamily: {
        montserrat: ['Montserrat', 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
        playfair: ['Playfair Display', 'serif'],
        sans: ['Inter', 'sans-serif'],
      },
      boxShadow: {
        minimal: '0 4px 6px -1px rgba(0, 0, 0, 0.1)',
        premium: '0 10px 15px -3px rgba(0, 0, 0, 0.1)',
      },
      transitionDuration: {
        fast: '200ms',
        normal: '300ms',
        slow: '400ms',
      },
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
        '128': '32rem',
      },
      fontSize: {
        'xs': ['0.75rem', { lineHeight: '1rem' }],
        'sm': ['0.875rem', { lineHeight: '1.25rem' }],
        'base': ['1rem', { lineHeight: '1.5rem' }],
        'lg': ['1.125rem', { lineHeight: '1.75rem' }],
        'xl': ['1.25rem', { lineHeight: '1.75rem' }],
        '2xl': ['1.5rem', { lineHeight: '2rem' }],
        '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
        '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
        '5xl': ['3rem', { lineHeight: '1' }],
        '6xl': ['3.75rem', { lineHeight: '1' }],
      },
      borderRadius: {
        'xl': '0.75rem',
        '2xl': '1rem',
        '3xl': '1.5rem',
      },
    },
  },
  plugins: [],
}