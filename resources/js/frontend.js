import Vue from "vue";
import router from "./router";
import App from "./App.vue"

require('./bootstrap');

new Vue({
    el:"#app",
    render:(h)=>h(App),
    router
})