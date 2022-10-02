<template>
<div >

  <div v-if="check">
    <NavBar :user="user"></NavBar>
   
      <!-- sezione con carosello di immagini -->
      <!-- <div class="debug_carosel d-none">
          <div class="heroOverlay d-none">
              <div class="h-100 d-flex justify-content-center align-items-center">
                  <div class="container_link_advanced d-flex flex-column justify-content-center align-items-center">
                      <h3>Ready for your next trip?</h3>
                      <p class="text-center py-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                      <router-link :to="{ name: 'advanced-search' }" class="basicBtn bigBtn primaryBtn">Start search</router-link>
                  </div>
              </div>
          </div>
      </div> -->
  
      <!-- sezione main con card => chiamata api -->
      <div v-if="accommodations.length >0" class="container py-5">
          <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1">
            
              <div class="col" v-for="accommodation in accommodations" :key="accommodation.id">

                <router-link class="text-decoration-none" :to="{ name: 'accommodations.show' , params : { slug:accommodation.slug} }">  <CardItem :accommodation="accommodation"></CardItem></router-link>
                
              </div>
          </div>
      </div>
      <div v-else class="container py-5">
          <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1 ">
            
            Hey! it seems that there are still no accommodations for these filters, try again with other choices!
            


          </div>
      </div>
  <div>
    <TheFooter></TheFooter>
  </div>
  </div>
  <div v-else class="spinner flex-column py-4 mb-5">
       
       <atom-spinner :animation-duration="1000" :size="100" color="#ff1d5e" />
   </div>
   <modal-advanced-search :object="takeObject" ></modal-advanced-search>
</div>
  </template>
  
  <script>
    import { AtomSpinner } from "epic-spinners";
    import axios from "axios";
    import NavBar from "../components/NavBar.vue";
    import CardItem from "../components/CardItem.vue";
    import ModalAdvancedSearch from '../components/ModalAdvancedSearch.vue';
import TheFooter from '../components/TheFooter.vue';

    
    export default {
      components: { NavBar, CardItem, ModalAdvancedSearch, TheFooter, AtomSpinner },
      data() {
        return {
            check:false,
            accommodations: [],
            apiParams:null,
            user:null
        };
    },
    methods: {
        async fetchdata() {
            await axios.get("/api/accommodations").then((resp) => {
                this.accommodations = resp.data.accommodations;
                this.user = resp.data.user;
                this.check=true
            })
        },
        takeObject(data){
          this.apiParams=data
        },
        async filteringDataFetch() {
     this.check=false
    await  axios.get("/api/advancedsearch/ ", {
      params: this.axiosParams
      
    }).then((resp) => {
        this.accommodations = resp.data;
        this.check=true
        
      });
      
    },
        
    },
    mounted() {
        this.fetchdata();
      },
      computed: {
    axiosParams() {
      // passare meglio i dati dell'array services
      const params = new URLSearchParams();
      if (this.apiParams.bedFilter) {
        params.append("beds", this.apiParams.bedFilter);
      }
      if (this.apiParams.bathFilter) {
        params.append("bathrooms", this.apiParams.bathFilter);
      }
      /* if (this.apiParams.typology_id) {
        params.append("typology_id", this.apiParams.typology_id);
      } */
      if (this.apiParams.roomFilter) {
        params.append("rooms", this.apiParams.roomFilter);
      }
      if (this.apiParams.radius) {
        params.append("radius", this.apiParams.radius);
      }
     /*  if (this.apiParams.services) {
        this.apiParams.services.forEach((service) => {
          params.append("services", service);
        });
      } */
      if (this.apiParams.latitude) {
        params.append("latitude", this.apiParams.latitude);
      }
      if (this.apiParams.longitude) {
        params.append("longitude", this.apiParams.longitude);
      }
      if (this.apiParams.query) {
        params.append("address", this.apiParams.query);
      }
      else{
        params.append("address", "Milano piazza leonardo");
      }
      

      return params;
    },
  },
    watch:{
      apiParams(newValue,oldValue){
          this.filteringDataFetch()
      }
    }
    };
    </script>
    
    <style lang="scss" scoped>
      @import "../../sass/partials/variables";
      .spinner{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
      .debug_carosel {
        height: 50vh;
        background-image: url("../../../public/img/img-prova.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }
      
      .container_link_advanced {
        background-color: #ffffff;
        height: 60%;
        width: 25%;
        border-radius: 1rem;
        padding: 30px;
      }
      
      .heroOverlay {
        background: rgba(255, 255, 255, 0.28);
        height: 100%;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(6px);
      }
      </style>
