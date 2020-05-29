import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Anime from "../components/anime/container";
import Song from "../components/song/container";

import NovelEditor from "../components/novel/editor";

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
        component: Song,
        name: "song",
        path: "/song"
    },
    {
        path: "/view/:id",
        component: View,
        name: "viewanime"
    },
    {
        path: "/novel/edit",
        component: NovelEditor,
        name: "novel"
    },
    {
        path: "/player/:id",
        name: "player",
        component: Player
    },
    {
        component: Contact,
        name: "contact",
        path: "/contact"
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
