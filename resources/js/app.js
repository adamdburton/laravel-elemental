require('./bootstrap');

import Vue from 'vue';
import router from './router';

import App from './components/App';

window.app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
