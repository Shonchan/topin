
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/*require('./bootstrap');

window.Vue = require('vue');

/!**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 *!/

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});*/

//require('./jquery-3.2.1.min.js');
try {
    window.$ = window.jQuery = require('jquery');

} catch (e) {}
require('./jquery.lazyload.min.js');
require('./main.js');




(function($) {
    $.lockfixed("#sidebar",{offset: {top: 74, bottom: 60}});
})(jQuery);