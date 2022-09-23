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

<script>
    import axios from "axios";
    import SideBar from "../components/SideBar.vue";
    
    export default {
      components: { SideBar },
      data() {
        return {
          data: [],
        };
      },
      methods:{
        async fetchdata(){
           await  axios.get("/api/advancedsearch").then((resp)=>{
                this.data=resp.data;
            })
        }
      },
       mounted() {
        this.fetchdata();
      },
    };
    </script>


<style scoped>

</style>