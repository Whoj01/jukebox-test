import { createMemoryHistory, createRouter } from 'vue-router'
import Cookies from 'js-cookie'

import LoginView from '@/views/Login/LoginView.vue'
import CreateAccountView from '@/views/Login/CreateAccountView.vue'
import HomeView from '@/views/Home/HomeView.vue'

const routes = [
  { path: '/', redirect: '/login'},
  { path: '/login', component: LoginView },
  { path: '/signup', component: CreateAccountView  },
  { path: '/home', component: HomeView },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
})

router.beforeEach((to, from, next) => {
    const token = Cookies.get('token');
  
    if (to.path === '/home') {
      if (!token) {
        next({ path: '/login', query: { notLoggedIn: true } });
      } else {
        next();
      }
    } else if (token) {
        next({ path: '/home' });
    } else {
      next();
    }
})

export default router