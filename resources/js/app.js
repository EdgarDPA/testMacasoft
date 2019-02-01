


require('./bootstrap');

window.Vue = require('vue');



Vue.component('alta-component', require('./components/AltaComponent.vue').default);
Vue.component('gestion-component', require('./components/VisorComponent.vue').default);
Vue.component('fila-component', require('./components/FilaComponent.vue').default);

const app = new Vue({
    el: '#adminApp'
});
