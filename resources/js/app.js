/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Your web app's Firebase configuration

require("./bootstrap");

window.Vue = require("vue");

import Vuetify from "../plugins/vuetify";
import store from "./store";
import router from "./router";

Vue.component(
    "app-container",
    require("./components/appComponent.vue").default
);

const app = new Vue({
    vuetify: Vuetify,
    store,
    router,
    el: "#app"
});
