const { default: Axios } = require("axios");

/* const listaOption=document.getElementById("datalistOptions");

let option =document.createElement("option")

option.setAttribute("value","data[i]")
listaOption.append(option)
 */


async function fetchData(query) {
      let dati;
      return  await Axios.get("https://api.tomtom.com/search/2/search/" + encodeURIComponent(query) + ".json?key=ziNw7Yn7FMXsuIsY65fMoQmyy7qrHcM3")
            .then((response) => {
                  dati = response.data.results
            })
      

};

let dati = fetchData("Via idria 51");

console.log(dati);



