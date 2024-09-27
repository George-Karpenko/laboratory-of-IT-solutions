// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    devtools: { enabled: false },
    css: [
        '~/assets/fonts/montserrat/stylesheet.css',
        '~/assets/fonts/roboto_condensed/stylesheet.css',
        '~/assets/css/classes/classes.scss',
        '~/assets/css/app.scss'
    ],
    components: [
        {
            path: '~/components',
            pathPrefix: false,
        },
    ],
    ssr: false,
    modules: [
        '@pinia/nuxt'
    ],
    plugins: [
        '~/plugins/outside.js'
    ],
    app: {
        head: {
            link: [
                { rel: 'icon', href: '/favicon.ico', type: 'image/x-icon' },
                { rel: 'icon', href: '/favicons/icon.svg', type: 'image/svg+xml' },
                { rel: 'apple-touch-icon', href: '/favicons/152x152.png', type: 'images/favicons/apple.png' },
            ],
        }
    }
})
