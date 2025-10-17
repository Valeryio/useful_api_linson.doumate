

import App from '@/App.vue';
import HomeView from '@/views/HomeView.vue';
import LoginView from '@/views/LoginView.vue';
import RegisterView from '@/views/RegisterView.vue';
import { createMemoryHistory, createRouter } from 'vue-router';

const routes = [
  { path: '/', component: HomeView },
  { path: '/auth/login', component: LoginView },
  { path: '/auth/register', component: RegisterView },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
});

export default router;