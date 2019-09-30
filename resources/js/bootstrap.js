import Vue from 'vue';

import VueRouter from 'vue-router';

import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';

import {Laue} from 'laue';

import ElTableDraggable from 'element-ui-el-table-draggable';
import Elemental from "~/elemental";
// import TreeTable from 'tree-table-vue'

Vue.use(Laue);
Vue.use(VueRouter);
Vue.use(ElementUI, {locale});

Vue.component('el-table-draggable', ElTableDraggable);
// Vue.component('el-tree-table', TreeTable);

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const elemental = require('./elemental');

window.$elemental = Vue.prototype.$elemental = elemental;