import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ManageUserView from '../views/ManageUserView.vue'
import UserLogView from '../views/UserLogView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/user-logs',
      name: 'user-logs',
      component: UserLogView
    },
    {
      path: '/manage-users',
      name: 'manage-users',
      component: ManageUserView
    }
  ]
})

export default router
