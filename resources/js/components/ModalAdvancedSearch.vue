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
                  value=""
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
              />
              <div class="row justify-content-between ">
                <div class="col">0</div>
                <div class="col">1</div>
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
                      <button class="btn btn-outline-secondary rounded-pill">
                        Qualsiasi
                      </button>
                    </div>
                    <div v-for="i in buttonFilterNumber" :key="i" class="col">
                      <button
                        v-if="i < 8"
                        class="btn btn-outline-secondary rounded-pill rounded-5"
                      >
                        {{ i }}
                      </button>
                      <button
                        v-else
                        class="btn btn-outline-secondary rounded-pill rounded-5"
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
                  <button class="btn btn-outline-secondary">
                    <div class="d-flex flex-column">
                      <div><i  :class="typology.icon"></i></div> <div>{{ typology.name }}</div>
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

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Understood</button>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      data: [],
      filters: ["Camere da letto", "Letti", "Bagni"],
      buttonFilterNumber: 8,
    };
  },
  methods: {
    fetchdata() {
      axios.get("/api/advancedsearch").then((resp) => {
        this.data = resp.data;
      });
    },
  },
  created() {
    this.fetchdata();
  },
};
</script>