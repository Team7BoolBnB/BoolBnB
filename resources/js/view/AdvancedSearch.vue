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
    // methods:{
    //   async fetchdata(){
    //     let params = new URLSearchParams(document.location.search);
    //     console.log(;
    //   
    //      await  axios.get("/api/advancedsearch/"+{
    //       
    //       params:{
    //         //devo passare i parametri ricavati dall'url per prendere quelli da services usare params.getAll('service')
    //         /* address:this.$route.params.query, */
    //         
    //         beds:this.$route.params.beds,
    //         bathrooms:this.$route.params.bath,
    //         typology_id:this.$route.params.typology_id,
    //         rooms:this.$route.params.rooms,
    //         radius:this.$route.params.radius,
    //         /* services:this.$route.params.services */
    //       }
    //      }).then((resp)=>{
    //           console.log(resp.data);
    //       })
    //       
    //      
    //   }
    // }
       mounted() {
        this.fetchdata();
      },
    };
    </script>


<style scoped>

</style>