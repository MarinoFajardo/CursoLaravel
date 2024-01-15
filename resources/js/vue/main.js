import { createApp } from 'vue'
import App from './App.vue'


import '../../css/app.css'


import { Oruga } from '@oruga-ui/oruga-next'
import '@oruga-ui/theme-oruga/dist/scss/oruga-full.scss'
import '@oruga-ui/oruga-next/dist/oruga'

import "@mdi/font/css/materialdesignicons.min.css" 

//import { VueCookies } from 'vue3-cookies'
import axios from 'axios'
import router from './router'


const app = createApp(App).use(Oruga).use(router)
app.config.globalProperties.$axios = axios
window.axios = axios
app.mount('#app')