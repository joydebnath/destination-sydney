// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    modules: [
        '@pinia/nuxt',
        '@nuxtjs/google-fonts',
        '@nuxtjs/tailwindcss',
    ],
    googleFonts: {
        families: {
            'Inter': [400, 500, 600, 700, 800],
            'Delicious Handrawn': [400],
        },
        preload: true
    },
    ssr: false,
    runtimeConfig: {
        public: {
            apiUrl: process.env.API_URL,
        }
    }
})
