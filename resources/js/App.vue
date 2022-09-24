<template>
    <div>
        <NavBar></NavBar>

        <!-- main con router-links -->
        <router-view/>

        <!-- footer -->
        <TheFooter></TheFooter>
        <ModalAdvancedSearch></ModalAdvancedSearch>
    </div>
</template>

<script>
import NavBar from './components/NavBar.vue';
import TheFooter from './components/TheFooter.vue';
import ModalAdvancedSearch from './components/ModalAdvancedSearch.vue';

    export default{
        components: { NavBar, TheFooter, ModalAdvancedSearch }
    }
</script>