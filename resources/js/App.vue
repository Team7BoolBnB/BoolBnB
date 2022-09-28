<template>
    <div>

        <!-- main con router-links -->
        <router-view/>

        <!-- footer -->
        <TheFooter></TheFooter>
        
    </div>
</template>

<script>
import TheFooter from './components/TheFooter.vue';


    export default{
        components: { TheFooter }
    }
</script>