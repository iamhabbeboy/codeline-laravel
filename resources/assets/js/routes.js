'use strict'
import Vue from 'vue'
import VueRouter from 'vue-router'

import HomeComponent from './components/HomeComponent.vue';
import ListingFilmComponent from './components/ListingFilmComponent.vue';
import SingleComponent from './components/SingleComponent.vue';

export default new VueRouter({
	routes: [
		{ path: '/', component: HomeComponent, name: 'home' },
		{ path: '/films', component: ListingFilmComponent, name: 'listing'},
		{ path: '/films/:slug', component: SingleComponent, name: 'single'},
		{ path: '*', redirect: { name: 'home'} }
	]
})
