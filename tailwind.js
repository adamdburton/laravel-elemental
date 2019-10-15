module.exports = {
    theme: {
        extend: {
            colors: {
                'brand': '#00B4A9',
                'brand-dark': '#1b8881',
                'dark-dark': '#1f1f1f',
                'dark-light': '#252525'
            },
            boxShadow: {
                'inner-lg': 'inset 0 2px 4px 0 rgba(0,0,0,0.3)'
            },
            width: {
                'xs': '20rem',
                'sm': '24rem',
                'lg': '32rem',
                'xl': '36rem',
                '2xl': '42rem',
                '3xl': '48rem',
                '4xl': '56rem',
                '5xl': '64rem',
                '6xl': '72rem'
            }
        }
    },
    variants: {
        backgroundColor: ['dark', 'dark-hover'],
        textColor: ['hover', 'dark', 'dark-hover'],
        borderWidth: ['dark', 'dark-hover'],
        borderColor: ['dark', 'dark-hover'],
        opacity: ['group-hover'],
        display: ['group-hover'],
        // margin: ['dark'],
    },
    plugins: [
        require('tailwindcss-dark-mode')()
    ]
}
