const { default: Axios } = require("axios");
/* Rchiamo tutti gli elementi che mi serviranno */
const inputText = document.getElementById("exampleDataList");
const longitudeInput = document.getElementById("longitudeInput");
const latitudeInput = document.getElementById("latitudeInput");
const formHandler = document.getElementById("formHandler");

const listaOption= document.getElementById("datalistOptions");

/* Funzione autocomplete */
async function fetchData(query) {
      
      if(listaOption.lastChild){

            while (listaOption.firstChild) {
                  listaOption.removeChild(listaOption.lastChild);
                }
      }

     
      

      if (query.length > 4) {
            let Promise = Axios.get("https://api.tomtom.com/search/2/search/" + encodeURIComponent(query) + ".json?key=ziNw7Yn7FMXsuIsY65fMoQmyy7qrHcM3")
            let results = await Promise;



            results.data.results.forEach((result, index) => {

                  let fullAddress = result.address;
                  let address = fullAddress.freeformAddress;
                  let provincia = fullAddress.countrySecondarySubdivision;
                  let country = fullAddress.countryCode;

                  let optionAddress = address + " " + provincia + ", " + country


                  let option = document.createElement("option")

                  option.setAttribute("value", optionAddress)
                  listaOption.append(option)
                  
            });
            
      }
     




};
/* Funzione salvataggio Latitudine Longitudine */
async function sendData(query) {

      let Promise = Axios.get("https://api.tomtom.com/search/2/search/" + encodeURIComponent(query) + ".json?key=ziNw7Yn7FMXsuIsY65fMoQmyy7qrHcM3")
      let results = await Promise;


      /* Setto la posizione negli input del form prendendo il risultato col rating più alto */


      let position = results.data.results[0].position;
      let latitude = position.lat;

      latitudeInput.setAttribute("value", latitude)
      let longitude = position.lon;
      longitudeInput.setAttribute("value", longitude)


      let fullAddress=results.data.results[0].address;
      let address = fullAddress.freeformAddress;
      let provincia = fullAddress.countrySecondarySubdivision;
      let country = fullAddress.countryCode;

      let optionAddress = address + " " + provincia + ", " + country

      inputText.value=optionAddress
      
      return true

}


/* All'evento keyup filtro e perfeziono la ricercca */
inputText.addEventListener("keyup", function (e) {
      e.preventDefault();
      fetchData(this.value);


})

/* All'evento submit del form salvo latitudine e longitudine e poi faccio il vero submit */
formHandler.addEventListener("submit", function (e) {
      e.preventDefault();



      async function submitted() {
            let pass = await sendData(inputText.value)
            if (pass) {
                  formHandler.submit();
            }
      }
      submitted();

})



