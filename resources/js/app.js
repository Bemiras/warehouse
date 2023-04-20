require('./bootstrap');
require('admin-lte');

window.Vue = require('vue').default;

Vue.component('order-create', require('./components/Order/Create').default);
// Initialize Vue
const app = new Vue({
    el: '#app',
});
