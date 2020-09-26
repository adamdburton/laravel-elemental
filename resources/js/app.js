require('./bootstrap');

import Vue from 'vue';
import router from './router';
import store from './store';

import Elemental from './components/Elemental';

window.app = new Vue({
    el: '#app',
    render: h => h(Elemental),
    router,
    store
});
