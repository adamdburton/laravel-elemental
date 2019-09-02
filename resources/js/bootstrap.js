import Vue from 'vue';

import VueRouter from 'vue-router';
import Notifications from 'vue-notification';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';
// import 'element-ui/lib/theme-chalk/index.css';

Vue.use(VueRouter);
Vue.use(Notifications, { componentName: 'v-notifications'});
Vue.use(ElementUI, {locale});

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
