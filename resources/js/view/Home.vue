<template>
  <div>
    <NavBar></NavBar>

    <!-- sezione con carosello di immagini -->
    <div class="debug_carosel">
      
      <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="container_link_advanced">
          <router-link :to="{ name: 'advanced-search' }"
            >pagina advanced</router-link
          >
        </div>
      </div>
    </div>

    <!-- sezione main con card => chiamata api -->
    <div>
      <CardList></CardList>
    </div>
  </div>



</template>

<script>
import axios from "axios";
import NavBar from "../components/NavBar.vue";
import CardList from "../components/CardList.vue";

export default {
  components: { NavBar, CardList },
  data() {
    return {
      accommodations: [],
    };
  },
  methods:{
    async fetchdata(){
       await  axios.get("/api/accommodations").then((resp)=>{
            this.accommodations=resp.data;
        })
    }
  },
   mounted() {
    this.fetchdata();
  },
};
</script>


<style lang="scss" scoped>
@import "../../sass/partials/variables";

.debug_carosel {
  height: 500px;
  background-color: rgb(157, 107, 130);
  background-image: url("../../../public/img/img-prova.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.container_link_advanced {
  background-color: $primaryColor;
  height: 300px;
  width: 400px;
  border-radius: 1rem;
  border: 2px solid $primaryColor;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>