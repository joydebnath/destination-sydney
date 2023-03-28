// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    modules: [
        '@nuxtjs/google-fonts',
        '@nuxtjs/tailwindcss',
    ],
    googleFonts: {
        families: {
            'Inter': [400, 500, 600, 700],
        },
        preload: true
    },
})
