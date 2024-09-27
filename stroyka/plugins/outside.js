export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.directive('click-outside', {
        mounted (el, node) {
            el.clickOutsideEvent = (e) => {
                if (!(el === e.target || el.contains(e.target))) {
                    node.value(e)
                }
            }

            if (node.arg === 'high') {
                document.body.addEventListener('click', el.clickOutsideEvent, true)
            } else {
                document.body.addEventListener('click', el.clickOutsideEvent, true)
            }
        },
        beforeUnmount (el, node) {
            if (node.arg === 'high') {
                document.body.removeEventListener('click', el.clickOutsideEvent, true)
            } else {
                document.body.removeEventListener('click', el.clickOutsideEvent, true)
            }
        }
    })
})