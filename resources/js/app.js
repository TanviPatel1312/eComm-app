
require('./bootstrap');

import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter);


import routes from './router/route'
const router = new VueRouter({
    history: true,
    mode: 'history',
    linkActiveClass: "active",
    routes
})
new Vue({
    el: '#app',
    router,
});
