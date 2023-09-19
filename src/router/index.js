import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Pays from "../views/Pays.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "Home",
      component: Home,
    },
    {
      path: "/pays",
      name: "Pays",
      component: Pays,
    },
  ],
});

export default router;
