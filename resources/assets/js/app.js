
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('order-list', require('./components/OrderList.vue').default);

Vue.component('product-status', require('./components/ProductStatus.vue').default);
Vue.component('product-update', require('./components/ProductUpdate.vue').default);
Vue.component('sellerprofile-status', require('./components/SellerprofileStatus.vue').default);
Vue.component('delete-buyer', require('./components/DeleteBuyer.vue').default);
Vue.component('delete-seller', require('./components/DeleteSeller.vue').default);
Vue.component('verify-code', require('./components/VerifyCode.vue').default);
Vue.component('order-status-update', require('./components/OrderStatusUpdate.vue').default);

Vue.component('order-item-status-update', require('./components/OrderItemStatusUpdate.vue').default);
Vue.component('dashboard-order', require('./components/DashboardOrder.vue').default);

Vue.component('giftorder-list', require('./components/GiftorderList.vue').default);
Vue.component('giftorder-details', require('./components/GiftorderDetails.vue').default);

Vue.component('review-popup', require('./components/ReviewPopup.vue').default);
Vue.component('user-status', require('./components/UserStatus.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('signin', require('./components/SignIn.vue').default);
// Vue.component('register', require('./components/Register.vue'));
// Vue.component('signin', require('./components/SignIn.vue'));

const app = new Vue({
    el: '#app'
});
