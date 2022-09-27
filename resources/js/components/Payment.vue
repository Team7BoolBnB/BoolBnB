<template>
    <div>
        <div class="container-sm text-center">
          {{ requestForm}}
            <Braintree v-if="token" :authorization="token" 
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

    </div>
</template>


<script>
    import axios from "axios";
import Braintree from "./Braintree.vue";
export default {
    components: { Braintree },
    data() {
        return {
            token:null,
           /*  disabilitato: true,
            caricamento: true, */
            requestForm:{
                token: "",
                idSponsorship:""
            }
        };
    },
    methods: {
        beforeBuy() {
        },
       /*  handleLoading(nonce){
            this.disabilitato=false
        }, */
        paymentOnSuccess(nonce){
            this.requestForm.token=nonce;
            this.buy()
        },
        paymentOnError(error){

        },
        async buy(){
   
            try {
                 let response =await axios.post("/api/make/payment", {...this.requestForm})
                 const message=response.data.message;
                 alert(message)
            } catch (error) {
                alert("Qualcosa è andato storto ")
            }
        }
    
    },
  
 mounted() {
       this.requestForm.idSponsorship=this.$route.params.sponsorship_id
        axios.get("/api/sponsorship").then(resp=>{
                this.token=resp.data.token;
                
            })

     /* let response = await axios.get("/api/sponsorship")
     this.token=response.data.token
     this.caricamento=false */
},


}

</script>