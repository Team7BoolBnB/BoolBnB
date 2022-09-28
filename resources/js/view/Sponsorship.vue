<template>
    <div>
        <div class="container">


        
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

                    <select v-model="sponsorship_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sponsorship_id" >

                            <option v-for="item in sponsorships" :key="item.id"  class="" 
                                :value="item.id">{{ item.name }} - {{ item.period }}h</option>
                        
                    </select>
                </div>
            </div>
            
            <div class="d-flex justify-content-center">
                <router-link  v-if="date && sponsorship_id && accommodation_id" :to="{ name: 'sponsorship.payment' , params : { date:date , sponsorship_id:sponsorship_id , accommodation_id:accommodation_id} } "><button  class="btn btn-primary">Acquista</button> </router-link>
                 <button v-else class="btn btn-primary" v-on:click="change()" >Acquista</button>
 
            </div>
            <div v-if="alert" class="alert alert-danger text-center w-50 mx-auto mt-3" role="alert">
              <span >Inserisci tutti i dati richiesti</span>
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
            date:null,
            alert:false
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
        }
    },

    mounted() {
        this.fetchdata()
    },
  

}
</script>