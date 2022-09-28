<template>
    <div>
        <div class="container">

            

            <div v-if="dataSubmit" >

                <h5 class="mt-5 mb-4">Which accommodation you want to sponsor?</h5>
    
                <select v-model="accommodation_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="accommodation_id" required="required">
                    
    
                        <option v-for="item in accommodations" :key="item.id" class="" 
                            :value="item.id">{{ item.title }} - {{ item.address }}</option>
    
                </select>
                
    
                <div class="row row-cols-lg-2 row-cols-sm-1 sponsortime">
                    <div class="col-6">
                        <h5 class="mt-5 mb-4">Start date</h5>
                        <input v-model="date" type="datetime-local" id="startTime" name="startTime">
                    </div>
                    <div class="col-6">
                        <h5 class="mt-5 mb-4">Duration</h5>
    
                        <select v-model="sponsorship_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sponsorship_id">
    
                                <option v-for="item in sponsorships"   :key="item.period"  class="" 
                                    :value="item.id">{{ item.name }} - {{ item.period }}h</option>
                            
                        </select>
                    </div>
                </div>
                
                <div class="d-flex justify-content-center">
                    <button  v-if="date && sponsorship_id && accommodation_id" class="btn btn-primary" @click="gocheckout()">Acquista</button> 

                     <button v-else class="btn btn-primary" v-on:click="change()" >Acquista</button>

                </div>
                <div v-if="alert" class="alert alert-danger text-center w-50 mx-auto mt-3" role="alert">
                  <span >Inserisci tutti i dati richiesti</span>
                </div>
            </div>
        <div v-if="checkout" class="text-center paymentContainer">
            <div >
                <h2>CHECKOUT:</h2>
                <h4>Stai sponsorizzando: {{accommodationName}}</h4>
                <h4>Nome Servizio: {{sponsorshipName}}</h4>
                <h4>Data di Inizio: {{date}}</h4>
                <h4>Durata sponsorizzazione: {{time}} h</h4>
                <h4>Prezzo: {{price}}</h4>
                <router-link  :to="{ name: 'sponsorship.payment' , params : { date:date , sponsorship_id:sponsorship_id , accommodation_id:accommodation_id} } "><button  class="btn btn-primary">Acquista</button> </router-link>
            </div>
        </div>
           
            
            
        
        </div>
    </div>
</template>


<script>
    import axios from 'axios';

export default {
    data() {
        return {
            accommodations:null,
            sponsorships:null,
            accommodation_id:null,
            sponsorship_id:null,
            price:null,
            sponsorshipName:null,
            accommodationName:null,
            time:null,
            date:null,
            alert:false,
            checkout:false,
            dataSubmit:true
        }
    },
    methods:{
        fetchdata(){
            axios.get("/api/accommodations/sponsorship").then((resp)=>{
                this.accommodations=resp.data.accommodations,
                this.sponsorships=resp.data.sponsorships
            })
        },
        change(){
            this.alert=true
        },
        gocheckout(){
            this.dataSubmit=false;
            this.checkout=true
        },
 
    },

    mounted() {
        this.fetchdata()
    },
    
    watch:{
        sponsorship_id(newValue){
            this.sponsorships.forEach(value => {
                
                if(newValue==value.id){
                    this.price=value.price;
                    this.time=value.period;
                    this.sponsorshipName=value.name;
                }
          });

        },
        accommodation_id(newValue){
            this.accommodations.forEach(value => {
                
                if(newValue==value.id){
                    this.accommodationName=value.title;
                    
                }
          });

        }
    }

}
</script>

<style lang="scss" scoped>
    
.paymentContainer{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>