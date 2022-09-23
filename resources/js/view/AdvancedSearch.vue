<template>
    <div>
        <h1>pagina advanced</h1>
    </div>
</template>

<script>
    import axios from "axios";
    
    
    export default {
      
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