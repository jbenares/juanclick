import { createRouter, createWebHistory } from "vue-router";


// import notFound from '../pages/notFound.vue'
import dashboard from '../pages/dashboard.vue'
import RegisterPassenger from '../passenger/passenger_registration.vue'
import RegisterDriver from '../driver/driver_registration.vue'
import RoomandSuites from '../pages/roomsandsuites.vue'
import Facilities from '../pages/facilities.vue'
import ContactPage from '../pages/contact_page.vue'

const routes = [
    {
        path:'/',
        component: dashboard,
    },
    {
        path:'/register_passenger',
        component: RegisterPassenger,
    },
        {
        path:'/register_driver',
        component: RegisterDriver,
    },
    {
        path:'/roomandsuites',
        component: RoomandSuites,
    },
    {
        path:'/facilities',
        component: Facilities,
    },
    {
        path:'/contact_page',
        component: ContactPage,
    },
    // {
    //     path:'/:pathMatch(.*)*',
    //     name:'notFound',
    //     component: notFound,
    //     meta:{
    //         requiresAuth:false
    //     }
    // }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
