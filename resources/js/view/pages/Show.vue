<template>
    <div class="position-relative">
        <div>
            <NavBar></NavBar>
        </div>
        <div class="no-visible">
            <div class="p-2">
                <h2>{{accommodation[0].title}}</h2>
                <div class="d-flex gap-3 align-items-center">
                    <!-- <div id="sectionPhoto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star-half" viewBox="0 0 16 16">
                            <path
                                d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                        </svg>
                    </div> -->
                    <p class="fw-semibold">{{accommodation[0].address}}</p>
                </div>
            </div>
                <div class="col-8">
                    <!-- da sistemare path immagini -->
                    <div class="py-3">
                        <img class="img-fluid" src="https://www.myhocasa.it/images/slide/0001new.jpg"
                            :alt="'Accommodation of ' + accommodation[0].title">
                    </div>
                </div>
        </div>
        
        
        <div class="container py-5">
            <div class="visible">
                <h2>{{accommodation[0].title}}</h2>
                <div class="d-flex gap-3 align-items-center pt-1">
                    <!-- <div id="sectionPhoto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star-half" viewBox="0 0 16 16">
                            <path
                                d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                        </svg>
                    </div> -->
                    <p class="fw-semibold">{{accommodation[0].address}}</p>
                </div>
            </div>
            <div class="row container-img mb-5">
                <div class="col-8 visible">
                    <!-- da sistemare path immagini -->
                    <div class="py-3">
                        <img class="img-fluid img_debug" src="https://www.myhocasa.it/images/slide/0001new.jpg"
                            :alt="'Accommodation of ' + accommodation[0].title">
                    </div>
                </div>
                <div class="col-4">
                    <div class="w-100 h-100 my-3">
                        <img class="w-100 img_debug"
                            src="https://www.google.com/maps/d/thumbnail?mid=1R-z0nvlZTWYN9LH3bxAtMhZScxo&hl=it"
                            :alt="'Accommodation of ' + accommodation[0].title">
                    </div>
                </div>
            </div>

            <!-- suddivisione in 2 colonne per permettere lo scroll fisso del form contatti -->
            <div class="row">
                <!-- col di sinistra con info accommodation in scroll -->
                <div class="col-8">
                    <div>

                        <h5>Accommodation type: {{accommodation[0].typology}}</h5>
                        <h5>Host: {{accommodation[0].firstName}} {{accommodation[0].lastName}}</h5>

                        <p class="pt-2 pb-4">{{accommodation[0].rooms}} Rooms · {{accommodation[0].beds}} Beds · {{accommodation[0].bathrooms}} Bathrooms</p>

                        <hr>

                        <!-- descrizione accommodation -->
                        <p class="py-5" v-html="accommodation[0].description"></p>

                        <hr>

                        <!-- testo di default per riempire pagina (versione italiano/inglese??) -->
                        <!-- <div class="py-5 fw-light">
                        <h4 class="mb-3 primaryColorText fst-italic">Concediti una bella vacanza</h4>
                        <p>
                            Concediti un viaggio all’insegna del relax, ritrova il tuo equilibrio psicofisico e ricarica le energie nelle più suggestive destinazioni del mondo.
                        </p>
                        <p>
                            Hai bisogno di staccare la spina e rigenerarti in una location tranquilla e affascinante, circondato da ogni comfort? Una vacanza relax è quello che fa per te.
                        </p>
                        <p>
                            Molte sono le mete tra cui scegliere dove concedersi momenti piacevoli e rilassanti. Crea il tuo itinerario su misura in base alla tua idea di relax e parti alla scoperta della natura e della cultura del tuo paese preferito.
                        </p>
                        <p>
                            Lasciati ispirare e crea il tuo viaggio relax su misura affidandoti ad un team di esperti che in base alle tue passioni, ti aiuterà a organizzare la tua esperienza nei minimi dettagli.
                        </p>
                    </div> -->
                        <!-- <div class="py-5">
                            <h4 class="mb-3">Treat yourself with a nice vacation</h4>
                            <p>
                                Treat yourself to a journey of relaxation, find your psychophysical balance and recharge
                                your energy in the most evocative destinations in the world.
                            </p>
                            <p>
                                Do you need to switch off and regenerate yourself in a quiet and charming location,
                                surrounded by every comfort? A relaxing holiday is the one for you.
                            </p>
                            <p>
                                There are many destinations to choose from where you can enjoy pleasant and relaxing
                                moments. Create your tailor-made itinerary based on your idea of ​​relaxation and set
                                out to discover the nature and culture of your favorite country.
                            </p>
                            <p>
                                Let yourself be inspired and create your tailor-made relaxation trip by relying on a
                                team of experts who, based on your passions, will help you organize your experience down
                                to the smallest detail.
                            </p>
                        </div> -->

                        <!-- servizi dell'accommodation -->
                        <div class="py-4" id="sectionServices">
                            <div>
                                <h4 class="mb-3">What will you find</h4>
                                <ul class="list-unstyled row row-cols-lg-2 row-cols-sm-3 direction-display-sm">
                                    <li class="py-2 fw-light" v-for="serv in accommodation" :key="serv.name">
                                        <i class="me-3" :class="serv.icon"></i>
                                        {{serv.name}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr>

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
                <div class="col-4 " id="sectionForm">
                    <TheForm></TheForm>
                </div>
            </div>

            <div class="py-1">
                <hr>

                <!-- sezione con barre di recensione -->
                <!-- <div class="row py-5 gap-5">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center w-100 py-2 me-3"
                            v-for="rec1 in accViews1" :key="rec1.name">
                            <div class="text_debug">{{rec1.name}}</div>
                            <div class="w-50 d-flex align-items-center">
                                <div class="bar_container">
                                    <span class="bar" style="width: 95%"></span>
                                </div>
                                <span>{{randomNumber()}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center w-100 py-2 me-3"
                            v-for="rec2 in accViews1" :key="rec2.name">
                            <div class="text_debug">{{rec2.name}}</div>
                            <div class="w-50 d-flex align-items-center">
                                <div class="bar_container">
                                    <span class="bar" style="width: 95%"></span>
                                </div>
                                <span>{{randomNumber()}}</span>
                            </div>
                        </div>
                    </div>
                </div> -->

<!--                 <hr> -->

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
        </div>

        <!-- sezione footer statica con link fasulli -->
        <!-- <FooterShow></FooterShow> -->

        <TheFooter></TheFooter>

    </div>
</template>


<script>
import Axios from 'axios';
import TheForm from '../../components/TheForm.vue';
import NavBar from '../../components/NavBar.vue';
import TheFooter from '../../components/TheFooter.vue';

export default {
    components: { TheForm, NavBar, TheFooter },
    data() {
        return {
            accommodation: {},
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
            }
        };
    },

    methods: {
        backgroundNavBar(element, element2) {
            if(window.scrollY > 70) {
                this.view.scroll = false;

                element2 = document.getElementById("navScrollShow");
                element2.classList.add("d-block");
            } else {
                this.view.scroll = true;
                element2 = document.getElementById("navScrollShow");
                element2.classList.add("d-none");
            }
        },
        fetch() {
            Axios.get("/api/accommodations/" + this.$route.params.slug).then((resp) => {
                this.accommodation = resp.data.accommodation;
            });
        },
        randomNumber(num, roundedNum) {
            num = Math.random() * (5 - 4) + 4;
            return roundedNum = num.toFixed(1);
        }
    },

    beforeMount() {
    window.addEventListener('scroll', this.backgroundNavBar)
    },

    mounted() {
        this.fetch();
    },
}
</script>

<style lang="scss" scoped>
@import "../../../sass/partials/variables";

.scroll {
    position: fixed;
    top: 0px;
    right: 0;
    left: 0;
    z-index: 9999;
    scroll-behavior: smooth;
    visibility: visible;
}

.title-font{
    font-size: 28px;
    font-weight: 500;
}

@media only screen and (max-width: 448px){
    .title-font{
        font-size: 17px;
        font-weight: 600;
    }
    .subtitle-font{
        font-size: 0.7rem !important;
        font-weight: 500 !important;
    }
}

.img_debug {
    border-radius: 1rem;
}

.primaryColorText {
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
    .container-img{
        flex-direction: column;
        align-content: center;
    }
    .col-8{
        width: 100%;
    }
    .col-4 {
        width: 100%;

        div{
            overflow: hidden;
            max-height: 600px;
            border: solid #f8fafc;
            border-radius: 0 0 20px 20px;
        }
    }
}

@media only screen and (max-width: 577px){
    .direction-display-sm{
        flex-direction: column;
    }
   
}
.no-visible{
    display: none;
}
@media only screen and (max-width: 600px) {
    .visible{
        display: none;
    }

    .no-visible{
        display: flex;
        flex-direction: column;
    }
}
</style>