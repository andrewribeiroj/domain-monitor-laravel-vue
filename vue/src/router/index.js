import { createRouter, createWebHistory } from "vue-router";
import DefaultLayout from '../components/DefaultLayout.vue'
import Dashboard from '../views/Dashboard.vue'
import Domains from '../views/Domains.vue'
import Domain from '../views/Domain.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import NotFound from '../views/404.vue'


const routes = [
    {
        path: '/',
        redirect: '/dashboard',
        component: DefaultLayout,
        children: [
            { path: '/dashboard', name: 'Dashboard', component: Dashboard },
            { path: '/domains', name: 'Domains', component: Domains },
            { path: '/domain/:id', name: 'Domain', component: Domain },
        ]
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/:pathMatch(.*)',
        component: NotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;