<template>
    <div id="map" class="border rounded-4 query-map">
        
    </div>
</template>

<script>
export default {
  props:{
    latitude:String,
    longitude:String
  },
  data(){
    return{
     
    }
    
  },
    methods:{
        mapRender(){
          let map = L.map('map').setView([this.latitude, this.longitude], 16);
          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
var marker = L.marker([this.latitude, this.longitude]).addTo(map);
    }
    },
 
    mounted(){
        this.mapRender();
      
    }
}
</script>


<style lang="scss">
    #map { height: 470px; }

    @media only screen and (max-width: 1400px) {
    .query-map{
        height: 23rem !important;
    }
}
@media only screen and (max-width: 1200px) {
    .query-map{
        height: 19rem !important;
    }
}

</style>