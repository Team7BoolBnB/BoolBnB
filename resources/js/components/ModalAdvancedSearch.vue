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
            <h3 class="modal-title" id="staticBackdropLabel">
              Advanced Search
            </h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body p-4">
            <!-- Where -->
            <div class="modal-container-section pt-2">
              <h4>Where</h4>
              <div class="form-floating mb-5">
                <input
                  class="form-control"
                  list="datalistOptions"
                  name="address"
                  id="exampleDataList"
                  placeholder="Search for your destination..."
                  v-model="query"
                  v-on:change="coordinateSet($event)"
                />
                <label for="exampleDataList">Search for your destination</label>
                <datalist id="datalistOptions"> </datalist>
              </div>
            </div>

            <!-- Range -->
            <div class="modal-container-section pb-4">
              <h4>Range</h4>
              <label for="customRange3" class="form-label">Km</label>
              <input
                type="range"
                class="form-range pe-4"
                min="0.5"
                max="20"
                step="0.5"
                id="customRange3"
                v-model="radius"
              />
              <div class="row justify-content-between">
                <div class="col pe-0">0</div>
                <div class="col p-0">2</div>
                <div class="col p-0">4</div>
                <div class="col p-0">6</div>
                <div class="col p-0">8</div>
                <div class="col p-0">10</div>
                <div class="col p-0">12</div>
                <div class="col p-0">14</div>
                <div class="col p-0">16</div>
                <div class="col p-0">18</div>
                <div class="col p-0">20</div>
              </div>
            </div>

            <hr />

            <!-- Typology -->
            <div class="modal-container-section pt-2 pb-4">
              <div class="mt-3 mb-3">
                <h4>Typology</h4>
              </div>
              <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1 direction-typologies-display-sm">
                <div
                  v-for="typology, index in data.typologies"
                  :key="typology.name"
                  class="col py-2"
                >
                  <button
                    class=" btn btn-outline-dark"
                    :class="typologyClasses[index].active ? 'active' : '' "
                    v-on:click="setTypology(typology.id, index)"
                  >
                    <div class="d-flex justify-content-center items-start">
                      <div><i :class="typology.icon"></i></div>
                      <div class="ps-2">{{ typology.name }}</div>
                    </div>
                  </button>
                </div>
              </div>
            </div>

            <hr />

            <!-- Rooms / Beds / Bathrooms -->
            <div class="modal-container-section py-2">
              <div  class="row ">
                <h4 class="py-4">Beds</h4>
                <div v-for="value in filtersBeds" :key="value.value" class="col">
                  <button
                    class="btn btn btn-outline-dark rounded-pill rounded-5"
                    :class="value.active ? 'active' : '' "
                    v-on:click="setFilterValue(filters[0], value.value),classCheck(filters[0], value.value)"
                  >
                  <span v-if="value.value ==0">Qualsiasi</span>
                  <span v-else-if="value.value ==8">8+</span>
                  <span v-else-if="value.value !=0">{{ value.value }}</span>


                  
                  </button>
            </div>
            </div>
            <div  class="row ">
                <h4 class="py-4">Rooms</h4>
                <div v-for="value in filterRooms" :key="value.value" class="col">
                  <button
                    class="btn btn btn-outline-dark rounded-pill rounded-5"
                    :class="value.active ? 'active' : '' "
                    v-on:click="setFilterValue(filters[1], value.value),classCheck(filters[1], value.value)"
                  >
                  <span v-if="value.value ==0">Qualsiasi</span>
                  <span v-else-if="value.value ==8">8+</span>
                  <span v-else-if="value.value !=0">{{ value.value }}</span>

                  </button>
            </div>
            </div>
            <div  class="row ">
                <h4 class="py-4">Bathrooms</h4>
                <div v-for="value in filtersBathrooms" :key="value.value" class="col">
                  <button
                    class="btn btn btn-outline-dark rounded-pill rounded-5"
                    :class="value.active ? 'active' : '' "
                    v-on:click="setFilterValue(filters[2], value.value),classCheck(filters[2], value.value)"
                  >
                  <span v-if="value.value ==0">Qualsiasi</span>
                  <span v-else-if="value.value ==8">8+</span>
                  <span v-else-if="value.value !=0">{{ value.value }}</span>

                  </button>
            </div>
            </div>
          </div>

            <hr />

            <div class="modal-container-section py-2">
              <div class="mt-3 mb-3">
                <h4>Services</h4>
              </div>
              <div class="row row-cols-lg-2 row-cols-md-1 direction-services-display-sm">
                <div
                  v-for="service in data.services"
                  :key="service.name"
                  class="col"
                >
                  <div class="form-check cardForm ps-0">
                    <input
                      v-model="services"
                      class="form-check-input my-4 d-none"
                      :name="service.id"
                      type="checkbox"
                      :value="service.id"
                      :id="service.name"
                    />
                    <label
                      class="form-check-label basicBtn formBtn px-4 py-3 my-2"
                      :for="service.name"
                    >
                      <i class="fa-solid pe-2" :class="service.icon"> </i
                      >{{ service.name }}</label
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer d-flex justify-content-between">
            <button type="basicBtn" class="textLink" @click="clearParams()">
              Clear all
            </button>
            <div
              v-if="checkQuery && radiusCheck"
              class="alert alert-danger"
              role="alert"
            >
              <span>Inserisci parametri di ricerca</span>
            </div>
            <div
              v-else-if="checkQuery || radiusCheck"
              class="alert alert-danger"
              role="alert"
            >
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
            <button
              v-else
              type="button"
              class="basicBtn bigBtn primaryBtn"
              v-on:click="alertPopup()"
            >
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
      filters:["Beds","Rooms","Bathrooms"],
      buttonFilterNumber: 8,
      buttonActive: "",
      filterActiceClass: "",
      checkQuery: false,
      radiusCheck: false,
      typologyClasses:[
      {  active: false },      
      {  active: false },
      {  active: false },
      {  active: false },
      ],
      filterRooms:[
            { value: "0", active: true },
            { value: "1", active: false },
            { value: "2", active: false },
            { value: "3", active: false },
            { value: "4", active: false },
            { value: "5", active: false },
            { value: "6", active: false },
            { value: "7", active: false },
            { value: "8", active: false },
          ],
      filtersBeds:[
            { value: "0", active: true },
            { value: "1", active: false },
            { value: "2", active: false },
            { value: "3", active: false },
            { value: "4", active: false },
            { value: "5", active: false },
            { value: "6", active: false },
            { value: "7", active: false },
            { value: "8", active: false },
          ],
      filtersBathrooms:[
            { value: "0", active: true },
            { value: "1", active: false },
            { value: "2", active: false },
            { value: "3", active: false },
            { value: "4", active: false },
            { value: "5", active: false },
            { value: "6", active: false },
            { value: "7", active: false },
            { value: "8", active: false },
          ],
     
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
      if (filter == "Rooms" && i == "8+") {
        this.roomFilter = "all";
      } else if (filter == "Beds" && i == "8+") {
        this.bedFilter = "all";
      } else if (filter == "Bathrooms" && i == "8+") {
        this.bathFilter = "all";}
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
    classCheck(name,value){

   if(name=="Bathrooms"){
        name=this.filtersBathrooms
      }
      else if(name=="Beds"){
        name=this.filtersBeds
      }
      else if(name=="Rooms"){
        name=this.filterRooms
      }
      else{
        alert("Si ok ed io sono scemo")
      }
      
      for (let index = 0; index < name.length; index++) {
        if(value==index){
          name[index].active=true
        }
        else{
          name[index].active=false
        }
        
      }
 


    },
    setTypology(id,value) {
      this.typology_id = id;

      for (let index = 0; index < this.typologyClasses.length; index++) {
        if(value==index){
          this.typologyClasses[index].active=true
        }
        else{
          this.typologyClasses[index].active=false
        }
        
      }
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
    alertPopup() {
      if (this.radius) {
        this.checkQuery = true;
      } else if (this.query) {
        this.radiusCheck = true;
      } else {
        this.radiusCheck = true;
        this.checkQuery = true;
      }
    },
  },
  props: {
    object: Function,
    loadServices: Function,
  },
  created() {
    this.buttonActive = "active";
    this.fetchdata();
  },

  watch: {
    query(newValue) {
      if (newValue.length > 0) {
        this.checkQuery = false;
      }
    },
    radius(newValue) {
      if (newValue != null) {
        this.radiusCheck = false;
      }
    },
  },
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
  
  @media only screen and (max-width: 768px){
      .direction-services-display-sm{
          flex-direction: column;
      }
  }
  @media only screen and (max-width: 571px){
      .direction-typologies-display-sm{
          flex-direction: column;
      }
  }
  @media only screen and (max-width: 571px){
      .pe-4{
          padding-right: 0.3rem !important;
      }
  }
  @media only screen and (max-width: 420px){
      .items-start{
          justify-content: start !important;
      }
  }
  </style>