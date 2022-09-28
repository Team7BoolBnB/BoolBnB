import Vue from "vue";
import router from "./router";
import App from "./App.vue"
import vuebraintree from 'vue-braintree'

Vue.use(vuebraintree)

require('./bootstrap');

new Vue({
    el:"#app",
    render:(h)=>h(App),
    router
})