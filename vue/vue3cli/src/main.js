import Vue from 'vue';

import 'bootstrap/dist/js/bootstrap';
import BootstrapVue from 'bootstrap-vue';
import {
  Navbar,
  Form,
  Layout,
  Card,
} from 'bootstrap-vue/es/components';

import App from './App.vue';
import router from './router';
import store from './store';

// import plugins individually - require exports-loader
import 'bootstrap/js/dist/modal';
import 'bootstrap/js/dist/tooltip';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);
Vue.use(Navbar, Form, Layout, Card);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app');
