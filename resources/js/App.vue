<template>
    <div>
        <NavBar></NavBar>

        <!-- main con router-links -->
        <router-view/>

        <!-- footer -->
        <!-- <TheFooter></TheFooter> -->
        
    </div>
</template>

<script>
import NavBar from './components/NavBar.vue';
import TheFooter from './components/TheFooter.vue';


    export default{
        components: { NavBar, TheFooter }
    }
</script>