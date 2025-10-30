import { createRouter, createWebHistory } from "vue-router";


// import notFound from '../pages/notFound.vue'
import Login from '../login.vue'
import Dashboard from '../dashboard.vue'
import ServicesRegistration from '../services_registration.vue'
import AvailableServices from '../available_services.vue'
//Driver
import DriverDashboard from '../driver/driver_dashboard.vue'
import DriverBooking from '../driver/driver_booking.vue'
//User
import UserDashboard from '../user/user_dashboard.vue'

const routes = [
    {
        path:'/',
        component: Login,
    },
    {
        path:'/dashboard',
        component: Dashboard,
    },
    {
        path:'/services_registration',
        component: ServicesRegistration,
    },
    {
        path:'/available_services',
        component: AvailableServices,
    },
    {
        path:'/user_dash',
        component: UserDashboard,
    },
    {
        path:'/driver_dash',
        component: DriverDashboard,
    },
    {
        path:'/driver_booking',
        component: DriverBooking,
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
