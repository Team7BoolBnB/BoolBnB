<template>
  <div>
    <div v-if="!displayLoading" class="container-sm text-center spinner">
     
      <Braintree
        v-if="token"
        :authorization="token"
        @loading="handleLoading()"
        @onSuccess="paymentOnSuccess"
        @onError="paymentOnError"
      ></Braintree>
      <!--  <div class="w-25 mx-auto text-center mt-3">
                <button v-if="!disabilitato" @click.prevent="beforeBuy()" class="btn btn-primary" > Buy </button>
                <button v-else  class="btn btn-primary" disabled>
                    {{caricamento ? 'Loading...' : 'Buy '}}
                </button>
                
            </div> -->
    </div>
    <div v-else class="spinner flex-column py-4 mb-5">
        <div v-if="paymentOK"><h1>Grazie per aver acquistato</h1> </div>
        <atom-spinner :animation-duration="1000" :size="100" color="#ff1d5e" />
    </div>
   
  </div>
</template>


<script>
import axios from "axios";
import { AtomSpinner } from "epic-spinners";
import Braintree from "./Braintree.vue";
export default {
  components: { Braintree, AtomSpinner },
  data() {
    return {
      token: null,
      /*  disabilitato: true,
            caricamento: true, */
      requestForm: {
        token: "",
        idSponsorship: "",
      },
      displayLoading: true,
      paymentOK:false
    };
  },
  methods: {
    beforeBuy() {},
    /*  handleLoading(nonce){
            this.disabilitato=false
        }, */
    paymentOnSuccess(nonce) {
      this.requestForm.token = nonce;
      this.buy();
      this.displayLoading=true
      this.paymentOK=true

    },
    paymentOnError(error) {},
    databaseUpdate() {
      axios
        .post("/api/update/database", {
          params: {
            sponsorship_id: this.$route.params.sponsorship_id,
            accommodation_id: this.$route.params.accommodation_id,
            startTime: this.$route.params.date,
          },
        })
        .then((response) => {
          if (response) {
            window.location.href = "http://127.0.0.1:8000/admin/sponsorship";
          }
          /* else{
                    return false
                } */
        });
    },
    async buy() {
      /*  let dbCheck= this.databaseUpdate() */
     
      try {
        let response = await axios.post("/api/make/payment", {
          ...this.requestForm,
        });
        const message = response.data.message;
        if (response.data.success) {
          /*  alert("pagamento andato a buon fine...inizio a caricare i dati a db"); */
          this.databaseUpdate();
        } else {
          alert(message);
        }
        //chiamata a database in post
      } catch (error) {
        alert("Qualcosa è andato storto ");
      }
    },
  },

  mounted() {
   
    this.requestForm.idSponsorship = this.$route.params.sponsorship_id;
    axios.get("/api/sponsorship").then((resp) => {
      this.token = resp.data.token;
      this.displayLoading=false
    });

    /* let response = await axios.get("/api/sponsorship")
     this.token=response.data.token
     this.caricamento=false */
  },
};
</script>

<style lang="scss" scoped>
    .spinner{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>