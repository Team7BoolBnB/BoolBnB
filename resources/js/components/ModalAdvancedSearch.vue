<template>
  <div>
    <div
      class="modal fade"
      id="prova"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="false"
    >
      <div
        class="
          modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg
        "
      >
        <div class="modal-content">
          <div class="modal-header px-4">
            <h3 class="modal-title" id="staticBackdropLabel">Advanced Search</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">

            <!-- Where -->
            <div class="modal-container-section pt-2">
              <h5>Where</h5>
              <div class="form-floating mb-5">
                <input class="form-control" list="datalistOptions" name="address" id="exampleDataList" placeholder="Search for your destination..." v-model="query" v-on:change="coordinateSet($event)" />
                <label for="exampleDataList">Search for your destination</label>
                <datalist id="datalistOptions"> </datalist>
              </div>
            </div>

            <!-- Range -->
            <div class="modal-container-section pb-4">
              <h5>Range</h5>
              <label for="customRange3" class="form-label">Km</label>
              <input type="range" class="form-range pe-4" min="0.5" max="20" step="0.5" id="customRange3" v-model="radius" />
              <div class="row justify-content-between">
                <div class="col">0</div>
                <div class="col">2</div>
                <div class="col">4</div>
                <div class="col">6</div>
                <div class="col">8</div>
                <div class="col">10</div>
                <div class="col">12</div>
                <div class="col">14</div>
                <div class="col">16</div>
                <div class="col">18</div>
                <div class="col">20</div>
              </div>
            </div>

            <hr />

            <!-- Typology -->
            <div class="modal-container-section pt-2 pb-4">
              <div class="mt-3 mb-3">
                <h5>Typology</h5>
              </div>
              <div class="row">
                <div v-for="typology in data.typologies" :key="typology.name" class="col">
                  <button class="basicBtn bigBtn typologyBtn" v-on:click="setTypology(typology.id)">
                    <div class="d-flex justify-content-center">
                      <div><i :class="typology.icon"></i></div>
                      <div class="ps-2">{{ typology.name }}</div>
                    </div>
                  </button>
                </div>
              </div>
            </div>

            <hr>

            <!-- Rooms / Beds / Bathrooms -->
            <div class="modal-container-section py-2">
              <div v-for="filter in filters" :key="filter" class="row">
                <div class="py-3">
                  <h5 class="mb-3">{{ filter }}</h5>
                  <div class="row flex-align-center">
                    <div class="col-2">
                      <button class="btn btn-outline-secondary rounded-pill" :class="buttonActive ? 'active' : ''" v-on:click="setFilterValue(filter, i)">
                        Qualsiasi
                      </button>
                    </div>
                    <div v-for="i in buttonFilterNumber" :key="i" class="col">
                      <button
                        v-if="i < 8"
                        class="btn btn-outline-secondary rounded-pill rounded-5"
                        :class="filter + i ? filterActiceClass : ''"
                        v-on:click="setFilterValue(filter, i)"
                      >
                        {{ i }}
                      </button>
                      <button
                        v-else
                        class="btn btn-outline-secondary rounded-pill rounded-5"
                        :class="filter + i ? filterActiceClass : ''"
                        v-on:click="setFilterValue(filter, i)"
                      >
                        {{ i }}+
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr>

            <div class="modal-container-section py-2">
              <div class="mt-3 mb-3">
                <h5>Services</h5>
              </div>
              <div class="row row-cols-2">

                <div v-for="service in data.services" :key="service.name" class="col">
                  <div class="form-check cardForm ps-0">
                    <input v-model="services" class="form-check-input my-4 d-none" :name="service.id" type="checkbox" :value="service.id" :id="service.name"/>
                    <label class="form-check-label basicBtn formBtn px-4 py-3 my-2" :for="service.name">
                      <i class="fa-solid pe-2" :class="service.icon">
                      </i>{{ service.name }}</label>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="textLink" @click="clearParams()">
              Clear all
            </button>
            <div v-if="checkQuery && radiusCheck" class="alert alert-danger" role="alert">
              <span>Inserisci parametri di ricerca</span>
            </div>
            <div v-else-if="checkQuery || radiusCheck" class="alert alert-danger" role="alert">
              <span v-if="checkQuery">Inserisci un indirizzo di ricerca</span>
              <span v-else-if="radiusCheck">Inserisci raggio di ricerca</span>
           
            </div>
            
            <button
              v-if="query && radius"
              v-on:click="
                object({
                  query: query,
                  bedFilter: bedFilter,
                  bathFilter: bathFilter,
                  radius: radius,
                  services,
                  typology_id: typology_id,
                  roomFilter: roomFilter,
                })
              "
              type="button"
              class="btn btn-dark queryButton"
              data-bs-dismiss="modal"
            >
              Search
            </button>
            <button v-else type="button" class="basicBtn bigBtn primaryBtn" v-on:click="alertPopup()">
              Search
            </button>

            <!--  <router-link
              :to="{
                name: 'filtered',
                params: { query: axiosParams },
              }"
              >prova</router-link
            > -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      data: [],
      accommodations: null,
      filters: ["Rooms", "Beds", "Bathrooms"],
      buttonFilterNumber: 8,
      buttonActive: "",
      filterActiceClass: "",
      checkQuery: false,
      radiusCheck:false,
     

      //Chiamata API data
      query: null,
      bedFilter: null,
      bathFilter: null,
      roomFilter: null,
      typology_id: null,
      services: [],
      radius: null,
    };
  },
  methods: {
    fetchdata() {
      Axios.get("/api/advancedsearch").then((resp) => {
        this.data = resp.data;
      });
    },

    setFilterValue(filter, i) {
      if (filter == "Rooms" && i > 0) {
        this.roomFilter = i;
      } else if (filter == "Beds" && i > 0) {
        this.bedFilter = i;
      } else if (filter == "Bathrooms" && i > 0) {
        this.bathFilter = i;
      } else if (filter == "Rooms") {
        this.roomFilter = "";
      } else if (filter == "Beds") {
        this.bedFilter = "";
      } else if (filter == "Bathrooms") {
        this.bathFilter = "";
      }
    },
    setTypology(id) {
      this.typology_id = id;
    },
    coordinateSet(e) {
      this.query = e.target.value;
     
    },
    clearParams() {
      (this.query = null),
        (this.bedFilter = null),
        (this.bathFilter = null),
        (this.roomFilter = null),
        (this.typology_id = null),
        (this.services = []),
        (this.radius = null);
    
    },
    alertPopup(){
      if(this.radius){
        this.checkQuery=true
      }
      else if (this.query){
        this.radiusCheck=true
      }
      else{
        this.radiusCheck=true
        this.checkQuery=true
      }
    }
  },
  props: {
    object: Function,
    loadServices:Function
  },
  created() {
    this.buttonActive = "active";
    this.fetchdata();
  },

  watch:{
    query(newValue){
      if(newValue.length > 0){
        this.checkQuery=false
      }
    },
    radius(newValue){
      if(newValue != null){
        this.radiusCheck=false
      }
    }

  }

};
</script>

<style lang="scss" scoped>

@import "../../sass/partials/variables";

.typologyBtn {
  padding: 20px !important;
  background-color: #ffffff;
  border: 1px solid $tertiaryColor;

}

.textLink {
  background-color: unset;
  border: unset;
  text-decoration: underline;
}


</style>