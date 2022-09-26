<template >
    <div class="container vh-100 py-5">
        <div>
            <h2>{{accommodation[0].title}}</h2>
            <div class="d-flex gap-3 align-items-end">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-star-half" viewBox="0 0 16 16">
                        <path
                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                    </svg>
                </div>
                <h5 class="mb-0">views</h5>
                <h5 class="mb-0">-</h5>
                <h5 class="mb-0">{{accommodation[0].address}}</h5>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-8">
                <!-- da sistemare path immagini -->
                <div class="py-3">
                    <img class="img-fluid" src="https://www.myhocasa.it/images/slide/0001new.jpg"
                        :alt="'Accommodation of ' + accommodation[0].title">
                </div>
            </div>
            <div class="col-4">
                <div class="py-3">
                    <h4 class="text-danger">MAPPA TOM TOM DA INSERIRE</h4>
                    <img class="w-100"
                        src="https://www.google.com/maps/d/thumbnail?mid=1R-z0nvlZTWYN9LH3bxAtMhZScxo&hl=it"
                        :alt="'Accommodation of ' + accommodation[0].title">
                </div>
            </div>
        </div>

        <!-- suddivisione in 2 colonne per permettere lo scroll fisso del form contatti?? -->
        <div class="row">
            <!-- col di sinistra con info accommodation in scroll -->
            <div class="col-8">
                <div>
                    <h5>Accommodation type: </h5>
                    <h5>Host:</h5>

                    <ol class="ps-0 d-flex list-unstyled ">
                        <li>
                            {{accommodation[0].beds}} Guests
                            <span class="px-2" aria-hidden="true"> · </span>
                        </li>
                        <li>
                            {{accommodation[0].rooms}} Rooms
                            <span class="px-2" aria-hidden="true"> · </span>
                        </li>
                        <li>
                            {{accommodation[0].beds}} Beds
                            <span class="px-2" aria-hidden="true"> · </span>
                        </li>
                        <li>
                            {{accommodation[0].bathrooms}} Bathrooms
                        </li>
                    </ol>

                    <p v-html="accommodation[0].description"></p>
                    <p>
                        Altre cose da tenere a mente
                        Alla nostra struttura si accede, partendo dalla località Vetta di San Pellegrino Terme:
                        - con una passeggiata a piedi di circa un'ora su sentiero e strada sterrata;
                        - con un automezzo di proprietà, PURCHE' 4x4, dopo aver corrisposto il pedaggio all'Associazione
                        Amici di Sussia, proprietaria della strada agrosilvopastorale di collegamento Vetta-Sussia;
                        - con il nostro servizio navetta al costo di 10 euro andata e ritorno.
                        Gli ospiti dovranno preoccuparsi di avere con sè il cibo per i giorni di permanenza, tranne per
                        la colazione che è offerta da noi.
                        Prima della partenza saranno dovuti, IN CONTANTI, l'eventuale servizio navetta utilizzato e
                        l'imposta di soggiorno di 1 euro al giorno per gli ospiti sopra i 14 anni.
                        La nostra struttura è dotata di riscaldamento, in caso di accensione è dovuto un supplemento
                        alla tariffa base, deciso in base al costo del pellet e del consumo.
                    </p>

                    <div class="text-danger py-4 text-uppercase">
                        collegare servizi dell'accommodation + le icone
                    </div>
                </div>

                <hr>

                <div>
                    <div class="text-danger">RECENSIONI</div>
                    <div class="row row-cols-3 g-2">
                        <div class="col">
                            <div class="card py-3 px-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati commodi omnis saepe
                                veniam asperiores enim delectus hic consectetur ullam, pariatur voluptatibus ad officiis
                                vel ducimus aliquam rem tenetur dolor sapiente.
                            </div>
                        </div>
                        <div class="col">
                            <div class="card py-3 px-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati commodi omnis saepe
                                veniam asperiores enim delectus hic consectetur ullam, pariatur voluptatibus ad officiis
                                vel ducimus aliquam rem tenetur dolor sapiente.
                            </div>
                        </div>
                        <div class="col">
                            <div class="card py-3 px-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati commodi omnis saepe
                                veniam asperiores enim delectus hic consectetur ullam, pariatur voluptatibus ad officiis
                                vel ducimus aliquam rem tenetur dolor sapiente.
                            </div>
                        </div>
                        <div class="col">
                            <div class="card py-3 px-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati commodi omnis saepe
                                veniam asperiores enim delectus hic consectetur ullam, pariatur voluptatibus ad officiis
                                vel ducimus aliquam rem tenetur dolor sapiente.
                            </div>
                        </div>
                        <div class="col">
                            <div class="card py-3 px-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati commodi omnis saepe
                                veniam asperiores enim delectus hic consectetur ullam, pariatur voluptatibus ad officiis
                                vel ducimus aliquam rem tenetur dolor sapiente.
                            </div>
                        </div>
                        <div class="col">
                            <div class="card py-3 px-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati commodi omnis saepe
                                veniam asperiores enim delectus hic consectetur ullam, pariatur voluptatibus ad officiis
                                vel ducimus aliquam rem tenetur dolor sapiente.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col di destra con dentro form fisso durante lo scroll della col di sinistra -->
            <div class="col-4 ">
                <div class="card card_debug w-100 fixed pb-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-danger">FORM MESSAGGI</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
            <hr>
            <h5>Things to know before booking</h5>
            <div class="row">
                <div class="col">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque laboriosam, iste fugit fuga earum
                    molestias fugiat mollitia expedita! Sed nobis quibusdam minus dolores hic dicta. Neque doloremque
                    exercitationem a voluptatum.
                    Corporis facere fuga, quidem id iusto quod? Quia, quos atque similique vel itaque illum nisi odit?
                    Facere dolores aliquid eius perferendis accusantium porro unde earum repellendus, nam neque quo ex.
                </div>
                <div class="col">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque laboriosam, iste fugit fuga earum
                    molestias fugiat mollitia expedita! Sed nobis quibusdam minus dolores hic dicta. Neque doloremque
                    exercitationem a voluptatum.
                    Corporis facere fuga, quidem id iusto quod? Quia, quos atque similique vel itaque illum nisi odit?
                    Facere dolores aliquid eius perferendis accusantium porro unde earum repellendus, nam neque quo ex.
                </div>
                <div class="col">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque laboriosam, iste fugit fuga earum
                    molestias fugiat mollitia expedita! Sed nobis quibusdam minus dolores hic dicta. Neque doloremque
                    exercitationem a voluptatum.
                    Corporis facere fuga, quidem id iusto quod? Quia, quos atque similique vel itaque illum nisi odit?
                    Facere dolores aliquid eius perferendis accusantium porro unde earum repellendus, nam neque quo ex.
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import Axios from 'axios';

export default {
    data() {
        return {
            accommodation: {}
        };
    },
    methods: {
        fetch() {
            Axios.get("/api/accommodations/" + this.$route.params.slug).then((resp) => {
                this.accommodation = resp.data
            })
        }
    },
    mounted() {
        this.fetch()
    },

}
</script>

<style lang="scss" scoped>
@import "../../../sass/partials/variables";

img {
    border-radius: 1rem;
}

.fixed {
    position: sticky !important;
    top: 2rem !important;
    z-index: 1 !important;
    width: 100%;
    display: inline-block !important;
    padding-right: 1px !important;
}

.card_debug{
    background-color: #ffffff;
    height: 60%;
    border-radius: 1rem;
    padding: 1rem;
}
</style>