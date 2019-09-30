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
            }
        }
    },
    variants: {
        backgroundColor: ['dark', 'dark-hover'],
        textColor: ['dark', 'dark-hover'],
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
