<template>
    <div id="map">
        
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
          let map = L.map('map').setView([this.latitude, this.longitude], 15);
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
    #map { height: 450px; }

</style>