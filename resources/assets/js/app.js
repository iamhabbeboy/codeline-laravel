'use strict'

import Vue from 'vue'
import App from './App.vue'

import router from './routes'
import VueRouter from 'vue-router';

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

Vue.component('paginate', require('vuejs-paginate'));

// import '../scss/app.scss'
Vue.use(VueRouter)

new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
