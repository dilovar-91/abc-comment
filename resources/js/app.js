require('./bootstrap');
window.Vue = require('vue');
import StarRating from 'vue-star-rating';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import moment from 'moment'
Vue.prototype.moment = moment 
Vue.use(VueSweetalert2);

Vue.component('avg-rating', require('./components/AvarageReviewByIdComponent.vue').default);
Vue.component('avg-rating-mini', require('./components/AvarageReviewMiniComponent.vue').default);
Vue.component('amountreview', require('./components/AmountReviewComponent.vue').default);
Vue.component('addreview', require('./components/AddReviewComponent.vue').default);
Vue.component('sort-select', require('./components/SortSelectComponent.vue').default);
Vue.component('star-rating', StarRating).default;


const app = new Vue({
    el: '#app'
});