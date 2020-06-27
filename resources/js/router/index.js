import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Anime from "../components/anime/container";
import Song from "../components/song/container";

import NovelEditor from "../components/novel/editor";
import NovelList from "../components/novel/list";
import NovelShow from "../components/novel/show";

import View from "../components/anime/view.vue";
import Player from "../components/anime/player.vue";

import Contact from "../components/contact/container";
import Team from "../components/main/team";
import Main from "../components/main/container";

const routes = [
    {
        component: Anime,
        name: "anime",
        path: "/anime"
    },
    {
        component: NovelList,
        name: "novel",
        path: "/novel"
    },
    {
        component: NovelShow,
        name: "novelshow",
        path: "/novel/show/:id"
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
        name: "noveledit"
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
        component: Team,
        name: "team",
        path: "/team"
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
