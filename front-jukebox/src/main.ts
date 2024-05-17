import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './routes/routes'
import Vue3Toastify, { type ToastContainerOptions } from 'vue3-toastify';

createApp(App)
    .use(router)
    .use(Vue3Toastify, {
        autoClose: 3000,
    } as ToastContainerOptions)
    .mount('#app')
