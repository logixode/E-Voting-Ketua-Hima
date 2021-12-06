require("./bootstrap");

import Vue from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import { Link } from "@inertiajs/inertia-vue";

InertiaProgress.init();
Vue.component("inertia-link", Link);

createInertiaApp({
    resolve: (name) => require(`./pages/${name}`),
    setup({ el, App, props }) {
        new Vue({
            render: (h) => h(App, props),
        }).$mount(el);
    },
});
