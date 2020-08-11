/* eslint-disable */
import Vue from 'vue'
import VueRouter from 'vue-router'
import DashboardComponent from '../components/DashboardComponent.vue'
import ProfileComponent from '../components/ProfileComponent.vue'
import UsersComponent from '../components/UsersComponent.vue'
import PatientsComponent from '../components/PatientsComponent.vue'
import PatientsListComponent from '../components/PatientsListComponent.vue'
import SignIn from '../components/SignIn.vue'
import MainLayout from '../components/MainLayout.vue'

Vue.use(VueRouter)

let routes = [
  {
    path: '/connexion',
    name: 'connexion',
    component: SignIn
  },
  {
    path: "/",
    component: MainLayout,
    redirect: "/dashboard",
    children: [ 
        {
          path: '/dashboard',
          name: 'dashboard',
          component: DashboardComponent
        },
        
        {
          path: '/profile',
          name: 'profile',
          component: ProfileComponent
        },
        {
          path: '/patients',
          name: 'patients',
          component: PatientsComponent
        },
        {
          path: '/liste-patients',
          name: 'liste-patients',
          component: PatientsListComponent
        },
        {
          path: '/users',
          name: 'users',
          component: UsersComponent
        },
      
      ]
    }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router