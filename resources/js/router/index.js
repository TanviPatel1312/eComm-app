import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import routes from './route'

const router = new VueRouter({
    history: true,
    mode: 'history',
    base: process.env.BASE_URL,
    routes
});
