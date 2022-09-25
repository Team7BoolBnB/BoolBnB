import VueRouter from "vue-router";
import Vue from "vue";
import Home from "./view/Home.vue"
import AdvancedSearch from "./view/AdvancedSearch.vue"
Vue.use(VueRouter);

const routes = [
    {
        path: "/" ,component: Home,name: "home ",
        
        /*  path: "/accommodation/:{id}" ,component: Home,name: "home.index", */

    },
    {path: "/advanced-search" , component: AdvancedSearch ,name: "advanced-search",},
    {path: "/advanced-search/:query" , component: AdvancedSearch ,name: "filtered",}

]


const router= new VueRouter({
    routes,
    mode:"history"
})

export default router