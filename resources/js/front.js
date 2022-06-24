require('./bootstrap');
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import vueBraintree from 'vue-braintree';

Vue.use(vueBraintree);

// import Axios from 'axios';
// import App from "./views/App.vue";

window.Vue = require('vue');
import Vue from 'vue';

import router from './router.js';

import App from "./views/App.vue";

const app = new Vue({
    el: '#root',
    router: router,
    render: h => h(App),
});
