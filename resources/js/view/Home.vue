<template>
<div>
    <NavBar></NavBar>

    <!-- sezione con carosello di immagini -->
    <div class="debug_carosel">
        <div class="heroOverlay">
            <div class="h-100 d-flex justify-content-center align-items-center">
                <div class="container_link_advanced d-flex flex-column justify-content-center align-items-center">
                    <h3>Ready for your next trip?</h3>
                    <p class="text-center py-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                    <router-link :to="{ name: 'advanced-search' }" class="basicBtn bigBtn primaryBtn">Start search</router-link>
                </div>
            </div>
        </div>
    </div>

    <!-- sezione main con card => chiamata api -->
    <div class="container py-5">
        <h2 class="text-center pt-3 pb-5">Sponsorized Accommodations</h2>
        <div class="row">
            <div class="col-3">
                <CardItem></CardItem>
            </div>
        </div>
    </div>
    
</div>

</template>

<script>
import NavBar from "../components/NavBar.vue";
import CardItem from "../components/CardItem.vue";

export default {
  components: { NavBar, CardItem },
};
</script>


<style lang="scss" scoped>
@import "../../sass/partials/variables";

.debug_carosel {
  height: 50vh;
  background-color: rgb(157, 107, 130);
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