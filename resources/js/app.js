
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Moment from 'moment';
window.moment = Moment;

import Vuetify from 'vuetify';

Vue.use(Vuetify);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('tasks-view', require('./components/TasksView.vue'));
Vue.component('app-main', require('./components/App.vue'));
Vue.component('app-nav', require('./components/AppNav.vue'));
Vue.component('app-subnav', require('./components/AppSubnav.vue'));
Vue.component('app-sidebar', require('./components/AppSidebar.vue'));
Vue.component('task-view', require('./views/TaskView.vue'));
Vue.component('projects-view', require('./views/ProjectsView.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


