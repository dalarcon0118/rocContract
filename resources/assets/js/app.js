
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
const config = {
      toolbar: [
        'removeFormat', 'undo', 'redo', '|', 'code', 'element', 'fontName', 'fontSize', 'foreColor', 'backColor', 'divider', 'bold', 'italic', 'underline', 'strikeThrough',
        'link', 'unLink', 'divider', 'subscript', 'superscript', 'divider', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',
        '|', 'indent', 'outdent', 'insertOrderedList', 'insertUnorderedList', '|', 'emoji', 'picture', 'table', '|', 'fullscreen', 'sourceCode', 'markdown'
      ],
      fontName: [
        {val: 'arial black'},
        {val: 'times new roman'},
        {val: 'Courier New'}
      ],
      fontSize: ['0.8rem', '1.0rem', '1.2rem', '1.5rem', '2.0rem']
    };


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import store from './store/dashboard';
import router from './route/DashboardRouter';
import MainApp from './views/dashboard/MainView.vue';
import Vue from 'vue';
import Vuex from 'vuex'
import Vueditor from 'vueditor'
Vue.use(Vueditor, config);

// your config here

Vue.component( 'main-app',MainApp);
new Vue({
    store,
    router,
    el: '#app'
});
