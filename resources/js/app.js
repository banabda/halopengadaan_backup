/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component("chat-component", require("./components/Main.vue").default);

import VueScreenSize from "vue-screen-size";
Vue.use(VueScreenSize);

import VModal from "vue-js-modal";
Vue.use(VModal, {
    dialog: true,
    dynamicDefaults: {
        draggable: true,
        resizable: false,
        height: "auto"
    }
});
Vue.filter("two_digits", value => {
    if (value < 0) {
        return "00";
    }
    if (value.toString().length <= 1) {
        return `0${value}`;
    }
    return value;
});
import Notifications from "vue-notification";
Vue.use(Notifications);

import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, { text: "Loading..." });
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
