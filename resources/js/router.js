import VueRouter from "vue-router";
import Vue from "vue";
import Home from "./view/Home.vue"
import AdvancedSearch from "./view/AdvancedSearch.vue"
import Show from "./view/pages/Show.vue"
Vue.use(VueRouter);

const routes = [
    {
        path: "/" ,component: Home,name: "home ",
        
        /*  path: "/accommodation/:{id}" ,component: Home,name: "home.index", */

    },
    {path: "/advanced-search" , component: AdvancedSearch ,name: "advanced-search",},
    {path: "/advanced-search/:query" , component: Home ,name: "filtered",},
    {path: "/accommodations/:slug" , component: Show ,name: "accommodations.show",},

    

]


const router= new VueRouter({
    routes,
    mode:"history"
})

export default router