import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Anime from "../components/anime/container";
import View from "../components/anime/view.vue";
import Player from "../components/anime/player.vue";
import Contact from "../components/contact/container";
import Main from "../components/main/container";

const routes = [
    {
        component: Anime,
        name: "anime",
        path: "/anime"
    },
    {
        component: Contact,
        name: "contact",
        path: "/contact"
    },
    {
        path: "/anime/:id",
        component: Anime,
        children: [
            {
                // UserProfile will be rendered inside User's <router-view>
                // when /user/:id/profile is matched
                path: "view",
                component: View
            }
        ]
    },
    {
        path: "/player/:id",
        name: "player",
        component: Player
    },

    {
        component: Main,
        name: "main",
        path: "/"
    }
];

export default new VueRouter({
    routes //short for ` routes: routes`
});
