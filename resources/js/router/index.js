import Vue from "vue";
import Router from "vue-router";

// import RouterTestFirst from "@/components/RouterTestFirst.vue";
// import RouterTestSecond from "@/components/RouterTestSecond.vue"; //@使う？
// import RouterTestFirst from "./components/RouterTestFirst.vue";
// import RouterTestSecond from "./components/RouterTestSecond.vue";

Vue.use(Router);

const routes = [
    {
        path: "/home",
        name: "Home",
        component: () => import("../OwnComponents/Pages/Home.vue"),
    },
];

const router = newVueRouter({
    mode: "history",
    routes,
});

export default router;
