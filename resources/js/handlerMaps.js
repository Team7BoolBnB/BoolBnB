const latitude=document.getElementById("latInput");
const longitude=document.getElementById("lonInput");




let map = L.map('map').setView([latitude.value, longitude.value], 15);
          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
var marker = L.marker([latitude.value, longitude.value]).addTo(map);