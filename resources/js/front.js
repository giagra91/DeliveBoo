require('./bootstrap');

import Axios from 'axios';
import App from "./views/App.vue";

window.Vue = require('vue');

const app = new Vue({
    el: '#root',
    render: h => h(App),
});