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
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Filtri</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="modal-container-section">
              <h3>Dove vuoi andare?</h3>
              <div class="form-floating mb-5">
                <input
                  class="form-control"
                  list="datalistOptions"
                  name="address"
                  id="exampleDataList"
                  placeholder="Type to
                search..."
                  v-model="query"
                  v-on:change="coordinateSet($event)"
                />
                <label for="exampleDataList">Type to search...</label>
                <datalist id="datalistOptions"> </datalist>
              </div>
            </div>

            <div class="modal-container-section">
              <h3>Distanza dal punto di interesse</h3>
              <label for="customRange3" class="form-label">Km</label>
              <input
                type="range"
                class="form-range pe-4"
                min="0"
                max="20"
                step="0.5"
                id="customRange3"
                v-model="radius"
              />
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
            <div class="modal-container-section">
              <div class="mt-3 mb-3">
                <h3>Stanze e letti</h3>
              </div>
              <div v-for="filter in filters" :key="filter" class="row">
                <div class="py-3">
                  <h5 class="mb-3">{{ filter }}</h5>
                  <div class="row flex-align-center">
                    <div class="col-2">
                      <button
                        class="btn btn-outline-secondary rounded-pill"
                        :class="buttonActive ? 'active' : ''"
                        v-on:click="setFilterValue(filter, i)"
                      >
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

            <div class="modal-container-section">
              <div class="mt-3 mb-3">
                <h3>Tipo di alloggio</h3>
              </div>
              <div class="row">
                <div
                  v-for="typology in data.typologies"
                  :key="typology.name"
                  class="col"
                >
                  <button
                    class="btn btn-outline-secondary"
                    v-on:click="setTypology(typology.id)"
                  >
                    <div class="d-flex flex-column">
                      <div><i :class="typology.icon"></i></div>
                      <div>{{ typology.name }}</div>
                    </div>
                  </button>
                </div>
              </div>
            </div>

            <div class="modal-container-section">
              <div class="mt-3 mb-3">
                <h3>Servizi</h3>
              </div>
              <h5 class="mb-3">Servizi essenziali</h5>
              <div class="row row-cols-2">
                <div
                  v-for="service in data.services"
                  :key="service.name"
                  class="col"
                >
                  <div class="form-check cardForm">
                    <input
                      v-model="services"
                      class="form-check-input my-4 d-none"
                      :name="service.id"
                      type="checkbox"
                      :value="service.id"
                      :id="service.name"
                    />
                    <label
                      class="
                        form-check-label
                        basicBtn
                        formBtn
                        ms-1
                        px-4
                        py-3
                        my-2
                      "
                      :for="service.name"
                      ><i class="fa-solid pe-2" :class="service.icon"></i
                      >{{ service.name }}</label
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer d-flex justify-content-between">
            <button
              type="button"
              class="btn btn btn-light"
              @click="clearParams()"
            >
              Cancella tutto
            </button>
            <div v-if="checkQuery && radiusCheck" class="alert alert-danger" role="alert">
              <span > Inserisci parametri di ricerca</span>
            </div>
            <div v-else-if="checkQuery || radiusCheck" class="alert alert-danger" role="alert">
              <span v-if="checkQuery"> Inserisci un indirizzo di ricerca</span>
              <span v-else-if="radiusCheck"> Inserisci raggio di ricerca</span>
           
            </div>
            
            <button
              v-if="query && radius"
              v-on:click="
                object({
                  query: query,
                  bedFilter: bedFilter,
                  bathFilter: bathFilter,
                  longitude: longitude,
                  latitude: latitude,
                  radius: radius,
                  services: services,
                  typology_id: typology_id,
                  roomFilter: roomFilter,
                })
              "
              type="button"
              class="btn btn-dark queryButton"
              data-bs-dismiss="modal"
            >
              Mostra mille alloggi
            </button>
            <button v-else type="button" class="btn btn-dark queryButton" v-on:click="alertPopup()">
              Mostra mille alloggi
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
      filters: ["Camere da letto", "Letti", "Bagni"],
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
      latitude: 45.45881,
      longitude: 9.13208,
    };
  },
  methods: {
    fetchdata() {
      Axios.get("/api/advancedsearch").then((resp) => {
        this.data = resp.data;
      });
    },

    setFilterValue(filter, i) {
      if (filter == "Camere da letto" && i > 0) {
        this.roomFilter = i;
      } else if (filter == "Letti" && i > 0) {
        this.bedFilter = i;
      } else if (filter == "Bagni" && i > 0) {
        this.bathFilter = i;
      } else if (filter == "Camere da letto") {
        this.roomFilter = "";
      } else if (filter == "Letti") {
        this.bedFilter = "";
      } else if (filter == "Bagni") {
        this.bathFilter = "";
      }
    },
    setTypology(id) {
      this.typology_id = id;
    },
    coordinateSet(e) {
      this.query = e.target.value;
      /* this.setCoordinateValue(); */
    },
    clearParams() {
      (this.query = null),
        (this.bedFilter = null),
        (this.bathFilter = null),
        (this.roomFilter = null),
        (this.typology_id = null),
        (this.services = []),
        (this.radius = null);
      /* (this.latitude = null);
        (this.longitude = null); */
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

  /* computed: {
    axiosParams() {
      // passare meglio i dati dell'array services
      const params = new URLSearchParams();
      if (this.bedFilter) {
        params.append("beds", this.bedFilter);
      }
      if (this.bathFilter) {
        params.append("baths", this.bathFilter);
      }
      if (this.typology_id) {
        params.append("typology_id", this.typology_id);
      }
      if (this.roomFilter) {
        params.append("rooms", this.roomFilter);
      }
      if (this.radius) {
        params.append("radius", this.radius);
      }
      if (this.services) {
        this.services.forEach((service) => {
          params.append("services", service);
        });
      }
      if (this.latitude) {
        params.append("latitude", this.latitude);
      }
      if (this.longitude) {
        params.append("longitude", this.longitude);
      }
      if (this.query) {
        params.append("address", this.query);
      }
      else{
        params.append("address", "Milano piazza leonardo");
      }
      

      return params;
    },
  }, */
};
</script>