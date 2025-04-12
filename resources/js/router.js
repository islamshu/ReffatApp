import { createRouter, createWebHistory } from "vue-router";

const routes = [{
        path: "/",
        component: () =>
            import ("./Pages/HomeRoute.vue"),
    },
    {
        path: "/test",
        component: () =>
            import ("./Pages/TestRoute.vue"),
    },
    {
        path: "/islam",
        component: () =>
            import ("./Pages/IslamRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});