<template>
    <div class="d-flex vh-100">
        <SideBar></SideBar>

        <main class="d-flex p-3 flex-column" style="flex: 1;">
            
            <div class="overflow-auto">
                <h1>pagina advanced</h1>
                <div>qui andranno le card visualizzate post ricerca</div>
            </div>
        </main>
        
    </div>
</template>

<script >
import SideBar from '../components/SideBar.vue';


export default{
    components: { SideBar }
}

</script>

<style scoped>

</style>