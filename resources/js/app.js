/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app"
});

import carousel from "owl.carousel";
import kit from "uikit";
import jquery from "jquery";

export default {
    components: { jquery },
    components: { carousel },
    components: { kit }
};
