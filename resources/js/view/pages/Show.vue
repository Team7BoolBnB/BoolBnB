<template>
  <div v-if="check" class="position-relative">
    <div>
      <NavBarShow :user="user"></NavBarShow>
    </div>

    <!-- Mobile section -->
    <div class="no-visible">
      <div class="p-2">
        <p class="title-font">{{ accommodation[0].title }}</p>
        <div class="d-flex gap-3 align-items-center">
          <h5 class="mb-0 subtitle-font">{{ accommodation[0].address }}</h5>
        </div>
      </div>
      <div
        id="carouselExampleFade1"
        class="col-8 novisible carousel slide carousel-fade"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner mt-2">
          <div class="carousel-item active d-flex justify-content-center">
            <img
              class="img-fluid"
              :src="'/storage/' + accommodation[0].image"
              alt=""
            />
          </div>
          <div
            class="carousel-item d-flex justify-content-center"
            v-for="element in listaTestimonial"
            :key="element.name"
          >
            <div>
              <img class="img-fluid" :src="element.img" alt="" />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleFade1"
            data-bs-slide="prev"
          >
            <span
              class="carousel-control-prev-icon btn-visible"
              aria-hidden="true"
            ></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleFade1"
            data-bs-slide="next"
          >
            <span
              class="carousel-control-next-icon btn-visible"
              aria-hidden="true"
            ></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Desktop section -->
    <div class="container py-5">
      <div class="visible">
        <h2>{{ accommodation[0].title }}</h2>
        <p class="fw-semibold">{{accommodation[0].address}}</p>
      </div>
      <div class="row container-img mb-5">
        <div id="carouselExampleFade" class="col-8 visible carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner mt-2">
            <div class="carousel-item active d-flex justify-content-center">
              <img class="img-fluid img_debug" :src="'/storage/' + accommodation[0].image" alt="" />
            </div>
            <div
              class="carousel-item d-flex justify-content-center"
              v-for="element in listaTestimonial"
              :key="element.name"
            >
              <div>
                <img class="img-fluid img_debug" :src="element.img" alt="" />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleFade"
              data-bs-slide="prev"
            >
              <div
                class="
                  btn btn-dark
                  opacity-75
                  rounded-circle
                  classe-btn-carousel
                "
              >
                <span
                  class="carousel-control-prev-icon primaryBtn"
                  aria-hidden="true"
                ></span>
              </div>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleFade"
              data-bs-slide="next"
            >
              <div
                class="
                  btn btn-dark
                  opacity-75
                  rounded-circle
                  classe-btn-carousel
                "
              >
                <span
                  class="carousel-control-next-icon primaryBtn"
                  aria-hidden="true"
                ></span>
              </div>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-4">
          <div class="py-3">

            <p class="m-0 text-uppercase primaryColorText">
              mappa tom tom da sistemare
            </p>

            <MapsContainer :latitude="accommodation[0].latitude" :longitude="accommodation[0].longitude"></MapsContainer>

          </div>
        </div>
      </div>

      <!-- suddivisione in 2 colonne per permettere lo scroll fisso del form contatti?? -->
      <div class="row">
        <!-- col di sinistra con info accommodation in scroll -->
        <div class="col-8">
          <div>
            <h5>{{typology.name}} - Host: {{ userDetails[0].firstName }}</h5>
           
            <p class="pb-4">{{ accommodation[0].rooms }} Rooms  · {{ accommodation[0].beds }} Beds · {{ accommodation[0].bathrooms }} Bathrooms</p>

            <hr />

            <!-- descrizione accommodation -->
            <p class="py-4 text-break" v-html="accommodation[0].description"></p>

            <hr />

            <!-- servizi dell'accommodation -->
            <div class="py-4" id="sectionServices">
              <div>
                <h4 class="mb-3">What will you find</h4>
                <ul
                  class="
                    list-unstyled
                    row row-cols-lg-2 row-cols-sm-3
                    direction-display-sm
                  "
                >
                  <li
                    class="py-2 fw-light"
                    v-for="serv in accommodation"
                    :key="serv.name"
                  >
                    <i class="me-3" :class="serv.icon"></i>
                    {{ serv.name }}
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <hr />

          <div class="py-5">
              <img :src="require('../../../../public/img/air-cover.png')" alt="Air Cover" width="150">
              <p class="pb-3 pt-4">Each reservation includes free protection against host cancellation, listing inaccuracies and other issues such as check-in difficulties.</p>

              <div class="row row-cols-lg-2 row-cols-sm-1 direction-display-sm g-5">
                  <div class="col">
                      <h6>Guarantee of conformity</h6>
                      <p>If at any time during your stay you realize that the accommodation does not match the description in the listing. We will find you a similar or better accommodation, or we will issue a refund in your favor.</p>
                  </div>

                  <div class="col">
                      <h6>Reservation guarantee</h6>
                      <p>In the unlikely event that a host has to cancel your reservation within 30 days of check-in, we'll find you a similar or better accommodation, or we'll refund you.</p>
                  </div>

                  <div class="col">
                      <h6>Check-in guarantee</h6>
                      <p>If you are unable to check in at the accommodation and the host does not solve the problem, we will find you a similar or better accommodation for the duration of your original stay, or we will refund you.</p>
                  </div>

                  <div class="col">
                      <h6>Security support H24</h6>
                      <p>If you do not feel safe, you will have priority access to specially trained operators on the subject of safety, both day and night.</p>
                  </div>

              </div>
          </div>
        </div>

        <!-- col di destra con dentro form fisso durante lo scroll della col di sinistra -->
        <div class="col-4" id="sectionForm">
          <!-- <div v-if="messageSended" class="alert alert-success text-center w-50 mx-auto mt-3" role="alert">
                  <span >Messaggio inviato correttamente</span>
                </div>
                <div v-if="messageDeny" class="alert alert-danger text-center w-50 mx-auto mt-3" role="alert">
                  <span >Errore durante l'invio dei dati, riprova più tardi.</span>
                </div> -->
          <div class="card card_debug w-100 fixed pb-3">
            <div class="py-2 px-2">
              <h4 class="text-center pb-3">Contatta l'host</h4>
              <form @submit.prevent="onFormSubmit">
                <div class="mb-3">
                  <label for="nameInput" class="form-label"><p class="mb-0">Name</p></label>
                  <input type="text" class="form-control" v-model="name" id="nameInput" placeholder="John Doe"/>
                </div>
                <div class="mb-3">
                  <label for="emailInput" class="form-label"><p class="mb-0">Email</p></label>
                  <input type="email" class="form-control" v-model="email" id="emailInput" placeholder="name@example.com"/>
                </div>
                <div class="mb-3">
                  <label for="messageInput" class="form-label"><p class="mb-0">Message</p></label>
                  <textarea class="form-control" id="messageInput" rows="4" style="height: 6rem" v-model="content"></textarea>
                </div>
                <div class="mb-3 text-center">
                  <button v-if="email && content && name " type="submit" class="basicBtn primaryBtn bigBtn">Send</button>
                  <button v-else type="submit" class="basicBtn primaryBtn bigBtn" @click="alertForm">Send</button>
                </div>
                <div v-if="alert " class="alert alert-danger text-center w-50 mx-auto mt-3" role="alert">
                            <span>Enter all the required data</span>
                        </div>
                <div v-if="messageSended && endAlert" class="alert alert-success text-center w-50 mx-auto mt-3" role="alert">
                  <span>Message sent</span>
                </div>
                <div v-if="messageDeny && endAlert" class="alert alert-danger text-center w-50 mx-auto mt-3" role="alert">
                  <span>Error, please try again.</span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <hr>

    <div class="py-5" id="sectionInfo">
                  <h4 class="mb-5">Things to know before booking</h4>
                  <div class="row direction-display-sm">
                      <div class="col py-2">
                          <div>
                              <h6>General rules</h6>
                              <ul class="list-unstyled">
                                  <li class="py-2">
                                      <i class="fa-solid fa-clock"></i>
                                      <p class="d-inline ms-2">
                                          Check-in: After 14:00 pm
                                      </p>

                                  </li>
                                  <li class="py-2">
                                      <i class="fa-solid fa-clock"></i>
                                      <p class="d-inline ms-2">
                                          Check-out: 10:00 am
                                      </p>
                                  </li>
                                  <li class="py-2">
                                      <i class="fa-solid fa-door-open"></i>
                                      <p class="d-inline ms-2">
                                          Self check-in online
                                      </p>
                                  </li>
                                  <li class="py-2">
                                      <i class="fa-solid fa-champagne-glasses"></i>
                                      <p class="d-inline ms-2">
                                          It's forbidden to organize parties / events (unless you invite the host)
                                      </p>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col py-2">
                          <div>
                              <h6>Health and safety</h6>
                              <ul class="list-unstyled">
                                  <li class="py-2">
                                      <i class="fa-solid fa-viruses"></i>
                                      <p class="d-inline ms-2">
                                          Airbnb's security practices apply for the COVID-19 emergency.
                                      </p>

                                  </li>
                                  <li class="py-2">
                                      <i class="fa-solid fa-circle-question"></i>
                                      <p class="d-inline ms-2">
                                          Carbon monoxide detector not signaled.
                                      </p>
                                  </li>
                                  <li class="py-2">
                                      <i class="fa-solid fa-circle-question"></i>
                                      <p class="d-inline ms-2">
                                          Fire alarm not signaled.
                                      </p>
                                  </li>
                                  <li class="py-2">
                                      <i class="fa-solid fa-circle-exclamation"></i>
                                      <p class="d-inline ms-2">
                                          Swimming pool or hot tub without gate or lock.
                                      </p>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col py-2">
                          <div>
                              <h6>General information</h6>
                              <p>Free cancellation within 5 days before.<br>Full Refund: Get 100% of what you paid for.</p>
                              <p>Cancellation within 2 days before.<br>Partial Refund: Receive a percentage refund (50%) for each night. Receive a refund of all costs of the service..</p>
                              <p>Read the host's full cancellation terms, which also apply in the event of illness or inconvenience related to the COVID-19 pandemic.</p>
                          </div>
                      </div>
                  </div>
              </div>

    </div>

    <!-- Footer -->
    <TheFooter></TheFooter>

  </div>

  <!-- Spinner -->
  <div v-else class="spinner flex-column py-4 mb-5">
        <atom-spinner :animation-duration="1000" :size="100" color="#ff1d5e" />
  </div>

</template>


<script>

import Axios from "axios";
import NavBarShow from "../../components/NavBarShow.vue";
import { AtomSpinner } from "epic-spinners";

import MapsContainer from "../../components/MapsContainer.vue";
import TheFooter from "../../components/TheFooter.vue";

export default {
    components: { NavBarShow, AtomSpinner, MapsContainer, TheFooter},

  data() {
    return {
      endAlert: true,
      content: "",
      name: "",
      email: "",
      user:null,
      userDetails:null,
      messageSended: false,
      messageDeny: false,
      check: false,
      alert:false,

      accommodation: {},
      user: null,
      typology: null,
      accViews1: [
        { name: "Pulizia" },
        { name: "Comunicazione" },
        { name: "Check-in" },
      ],
      accViews2: [
        { name: "Precisione" },
        { name: "Posizione" },
        { name: "QUalità/prezzo" },
      ],
      view: {
        scroll: true,
      },

      listaTestimonial: [
        {
          title: "High level of efficiency and scientific teching methods",
          paragraph:
            "I am free to learn at my own pace, follow my own schedule and choose the subject I want to learn from the syllabus. Great study portal for people like me.",
          name: "MINA HOLLACE",
          job: "Freelancer",
          img: "https://www.mesaimmobiliare.it/images/gallery/C%202324.jpeg",
        },
        {
          title:
            "Professional team of specialists and appasionate mentors at reach",
          paragraph:
            "I need get a certification for English proficiency ad MaxCoach is my best choise. Their tutors are smart and professional when dealing with students.",
          name: "MADLEY PONDOR",
          job: "IT Specialists",
          img: "https://www.mesaimmobiliare.it/images/gallery/BAGNO%20NEW.jpeg",
        },
        {
          title: "Nice Community, and constant help for all client",
          paragraph:
            "I need get a certification for English proficiency ad MaxCoach is my best choise. Their tutors are smart and professional when dealing with students.",
          name: "ARTUR PORTUA",
          job: "Social Media Manager",
          img: "https://www.mesaimmobiliare.it/images/gallery/BAGNO%201.jpeg",
        },
        {
          title: "Beatiful ambience, and friendly custumer care",
          paragraph:
            "I need get a certification for English proficiency ad MaxCoach is my best choise. Their tutors are smart and professional when dealing with students.",
          name: "NATASHA MILIKOVA",
          job: "Data Analyst",
          img: "https://www.mesaimmobiliare.it/images/gallery/BAGNO.jpeg",
        },
      ],
    };
  },

  methods: {
    backgroundNavBar(element, element2) {
      if (window.scrollY > 70) {
        this.view.scroll = false;

        /*  element2 = document.getElementById("navScrollShow");
                element2.classList.add("d-block"); */
      } else {
        this.view.scroll = true;
        /*  element2 = document.getElementById("navScrollShow");
                element2.classList.add("d-none"); */
      }
    },
    alertForm(){
      this.alert=true
    },
    fetch() {
      Axios.get("/api/accommodations/" + this.$route.params.slug).then(
        (resp) => {
          this.check = true;
          this.accommodation = resp.data.accommodation;
          this.typology = resp.data.typology;
          this.user = resp.data.user;
          this.userDetails=resp.data.userDetails;
          
        }
      );
    },
    randomNumber(num, roundedNum) {
      num = Math.random() * (5 - 4) + 4;
      return (roundedNum = num.toFixed(1));
    },
    onFormSubmit() {
     
      const formData = new FormData();
      formData.append("email", this.email);
      formData.append("name", this.name);
      formData.append("content", this.content);
      formData.append("accommodation_id", this.accommodation[0].id);

      Axios.post("/api/messages", formData).then((resp) => {
        this.timerAlert();
        if (resp.data.message) {
          this.messageSended = true;
          this.alert=false
          
        } else {
          this.messageDeny = true;
        }
      });
    },
    timerAlert() {
      this.content=null;
          this.email=null;
          this.name=null;
      setTimeout(() => {
        this.endAlert = false;
      }, 3000);
    },
  },

  beforeMount() {
    window.addEventListener("scroll", this.backgroundNavBar);
  },

  mounted() {
   
    this.check = false;
    this.fetch();
  },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/partials/variables";


.spinner{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
.primaryColorText {
  color: $primaryColor;
}

.fixed {
  position: sticky !important;
  top: calc($navBarHeight + 2rem) !important;
  z-index: 1 !important;
  width: 100%;
  display: inline-block !important;
}

.card_debug {
  background-color: #ffffff;
  border-radius: 1rem;
  padding: 1rem;
}
.scroll {
  position: fixed;
  top: 0px;
  right: 0;
  left: 0;
  z-index: 9999;
  scroll-behavior: smooth;
  visibility: visible;
}

.title-font {
  font-size: 28px;
  font-weight: 500;
}

@media only screen and (max-width: 448px) {
  .title-font {
    font-size: 17px;
    font-weight: 600;
  }
  .subtitle-font {
    font-size: 0.7rem !important;
    font-weight: 500 !important;
  }
}

.img_debug {
  border-radius: 1rem;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.primaryColorText {
  color: $primaryColor;
}

i {
  color: $primaryColor;
}

.link_debug {
  color: black;
  text-decoration: none;

  &:hover {
    color: $primaryColor;
  }
}

.bar_container {
  position: relative !important;
  height: 4px !important;
  width: 100% !important;
  margin-right: 1rem !important;
  background: rgb(221, 221, 221) !important;
  border-radius: 2px !important;
}

.bar {
  position: absolute !important;
  top: 0px !important;
  left: 0px !important;
  bottom: 0px !important;
  background: $primaryColor !important;
  border-radius: 2px !important;
}

.text_debug {
  width: 100% !important;
  overflow: hidden !important;
  text-overflow: ellipsis !important;
  white-space: nowrap !important;
}

.border {
  border-top: 1px solid $tertiaryColor;
}

@media only screen and (max-width: 992px) {
  .container-img {
    flex-direction: column;
    align-content: center;
  }
  .col-8 {
    width: 100%;
  }
  .col-4 {
    width: 100%;

    div {
      overflow: hidden;
      max-height: 600px;
      border: solid #f8fafc;
      border-radius: 0 0 20px 20px;
    }
  }
  .img-smollest-display {
    height: 15rem;
    overflow: hidden;
    border-radius: 20px;
  }
}

@media only screen and (max-width: 577px) {
  .direction-display-sm {
    flex-direction: column;
  }
}
.no-visible {
  display: none;
}
@media only screen and (max-width: 600px) {
  .visible {
    display: none;
  }

  .no-visible {
    display: flex;
    flex-direction: column;
  }
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
  max-height: 30rem;
  border-radius: 34px;
}

.classe-btn-carousel {
  display: flex;
  padding: 0.7rem;
}

@media only screen and (max-width: 1400px) {
  .carousel-inner {
    max-height: 24rem;
  }
}
@media only screen and (max-width: 1200px) {
  .carousel-inner {
    max-height: 21rem;
  }
}
@media only screen and (max-width: 767px) {
  .carousel-inner {
    max-height: 18rem;
  }
  .btn-visible {
    display: none;
  }
}
@media only screen and (max-width: 600px) {
  .carousel-inner {
    max-height: 18rem;
    border-radius: 0;
  }
  .btn-visible {
    display: none;
  }
}
@media only screen and (max-width: 575px) {
  .carousel-inner {
    max-height: 15rem;
  }
}
@media only screen and (max-width: 405px) {
  .carousel-inner {
    max-height: 11rem;
  }
}
</style>