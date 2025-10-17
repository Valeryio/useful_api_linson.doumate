import App from "@/App.vue";
import HomeView from "@/views/HomeView.vue";
import LoginView from "@/views/LoginView.vue";
import RegisterView from "@/views/RegisterView.vue";
import { createMemoryHistory, createRouter } from "vue-router";

const routes = [
  {
    path: "/",
    component: HomeView,
    name: "home",
  },
  {
    path: "/auth/login",
    component: LoginView,
    name: "login",
  },
  {
    path: "/auth/register",
    component: RegisterView,
    name: "register",
  },
];

export default createRouter({
  history: createMemoryHistory(),
  routes,
});
