import { createRouter , createWebHistory} from 'vue-router'


const routes = [
    {
        name:'list',
        path:'/vue',
        component: () => import('./components/List.vue')
    },
    {
        name:'save',
        path:'/vue/save/:slug?',
        component: () => import('./components/Save.vue')
    },
    {
        name:'login',
        path:'/vue/login',
        component: () => import('./components/Auth/login.vue')
    }
]

const router = createRouter({
    history:createWebHistory(),
    routes:routes
})

export default router