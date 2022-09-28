<template>

<div>
  <div class="border">
      <nav class="fixed-bottom navbar navbar-expand-md navbar-light bg-white">
        <div class="container-fluid d-flex text-middle">
          <!-- logo -->
          <div class="customCol d-flex align-items-center">
            <a href="/">
              <img src="/img/logo-s.png" alt="Logo" width="30" />
            </a>
            <div class="nofoot">
              <ul class="m-0 d-flex align-items-center justify-content-between">
                <li class="spacing">
                  <a class="foot-link" href="#">Privacy</a>
                </li>
                <li class="spacing">
                  <a class="foot-link" href="#">Termini</a>
                </li>
                <li class="spacing">
                  <a class="foot-link" href="#">Mappa del sito</a>
                </li>

                <li class="spacing">
                  <a class="foot-link" href="#">Dettagli dell'azienda</a>
                </li>
                <li class="spacing">
                  <a class="foot-link" href="#">Destinazioni</a>
                </li>
              </ul>
            </div>
          </div>

          <!--login-->
          <div>
            <div class="dropup nofoot">
                <button onclick="myFunction()" class="basicBtn smallBtn primaryBtn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Supporti e risorse
                </button>
                <div class="dropdown-menu dropdown-menu-end position-drop">
                    <div class="d-flex justify-content-between change-direction popup-width p-5 ">
                        <div class="container">
                            <div class="row row-cols-lg-4  row-cols-md-2 row-cols-sm-1  ">
                                <div class="col-3">
                                    <ul class="list-unstyled">
                                            <li><h5>Assistenza</h5></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Centro Assistenza</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">AirCover</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Informazioni di sicurezza</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Accessibilità per tutti</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Opzioni di cancellazione</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">La nostra risposta all'emergenza COVID-19</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Segnala problemi nel quartiere</button></li>
                                    </ul>
                                </div>
                                <div class="col-3">
                                    <ul class="list-unstyled">
                                            <li><h5>Community</h5></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Airbnb.org: un rifugio sicuro</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Supporta i rifugiati afghani</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Contro la discriminazione</button></li>
                                    </ul>
                                </div>
                                <div class="col-3">
                                    <ul class="list-unstyled">
                                            <li><h5>Ospitare</h5></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Prova a ospitare</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">AirCover per gli host</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Esplora le risorse per host</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Vai al forum della community</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Come ospitare responsabilmente</button></li>
                                    </ul>
                                </div>
                                <div class="col-3">
                                    <ul class="list-unstyled">
                                            <li><h5>BoolBnb</h5></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Newsroom</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Scopri le nuove funzionalità</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Lettera dai nostri fondatori</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Opportunità di lavoro</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Investitori</button></li>
                                            <li><button class="dropdown-item font-linkfoot" type="button">Gift card</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
          </div>
        </div>
      </nav>
  </div>
  <div class="container-fluid yesfoot1">
      <div class="row pt-4">
          <div class="col text-center">
              <h3>Link Utili</h3>
              <hr>
          </div>
      </div>
              <div class="row">
                  <div class="col-md-12">
                      <ul class="list-unstyled">
                            <li><h5>Assistenza</h5></li>
                                <li><button class="dropdown-item font-linkfoot" type="button">Centro Assistenza</button></li>
                                <li><button class="dropdown-item font-linkfoot" type="button">AirCover</button></li>
                                <li><button class="dropdown-item font-linkfoot" type="button">Informazioni di sicurezza</button></li>
                                <li><button class="dropdown-item font-linkfoot" type="button">Accessibilità per tutti</button></li>
                                <li><button class="dropdown-item font-linkfoot" type="button">Opzioni di cancellazione</button></li>
                                <li><button class="dropdown-item font-linkfoot" type="button">La nostra risposta all'emergenza COVID-19</button></li>
                                <li><button class="dropdown-item font-linkfoot" type="button">Segnala problemi nel quartiere</button></li>
                        </ul>
                  </div>
                  <hr>
                  <div class="col-12">
                      <ul class="list-unstyled">
                            <li><h5>Community</h5></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Airbnb.org: un rifugio sicuro</button></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Supporta i rifugiati afghani</button></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Contro la discriminazione</button></li>
                        </ul>
                  </div>
                  <hr>
                  <div class="col-12">
                      <ul class="list-unstyled">
                        <li><h5>Assistenza</h5></li>
                        <li><button class="dropdown-item font-linkfoot" type="button">Centro Assistenza</button></li>
                        <li><button class="dropdown-item font-linkfoot" type="button">AirCover</button></li>
                        <li><button class="dropdown-item font-linkfoot" type="button">Informazioni di sicurezza</button></li>
                        <li><button class="dropdown-item font-linkfoot" type="button">Accessibilità per tutti</button></li>
                        <li><button class="dropdown-item font-linkfoot" type="button">Opzioni di cancellazione</button></li>
                        <li><button class="dropdown-item font-linkfoot" type="button">La nostra risposta all'emergenza COVID-19</button></li>
                        <li><button class="dropdown-item font-linkfoot" type="button">Segnala problemi nel quartiere</button></li>
                        </ul>
                  </div>
                  <hr>
                  <div class="col-12">
                      <ul class="list-unstyled">
                            <li><h5>BoolBnb</h5></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Newsroom</button></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Scopri le nuove funzionalità</button></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Lettera dai nostri fondatori</button></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Opportunità di lavoro</button></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Investitori</button></li>
                            <li><button class="dropdown-item font-linkfoot" type="button">Gift card</button></li>
                        </ul>
                  </div>
              </div>
              <div class="row padding-foot">
                  <div class="col">
                      <div>
                        <ul class="foot-link-mini d-flex align-items-center justify-content-between">
                            <li class="spacing">
                                <a class="nav-link" href="#">Privacy</a>
                            </li>
                            <li class="spacing">
                                <a class="nav-link" href="#">Termini</a>
                            </li>
                            <li class="spacing">
                                <a class="nav-link" href="#">Mappa del sito</a>
                            </li>
                            <li class="spacing">
                                <a class="nav-link" href="#">Dettagli dell'azienda</a>
                            </li>
                            <li class="spacing">
                                <a class="nav-link" href="#">Destinazioni</a>
                            </li>
                        </ul>
                    </div>
                  </div>
              </div>
          </div>
</div>
</template>

<script>
</script>

<style lang="scss" scoped>
@import "../../sass/partials/variables";

.border {

  border-top: 1px solid $tertiaryColor;
}
.font-linkfoot{
    font-size: 12px;
}
.spacing {
  padding-right: 10px;
  list-style: none;
}
.foot-link{
    font-size: 0.8rem;
    text-decoration: none;
    color: #9c9c9d;
}

.popup-width{
    width: 95vw;
}
.position-drop{

    z-index: -1;
    border: solid white;
    border-radius: 44px 44px 0px 0px;
    box-shadow: 16px -17px 11px 5px rgb(209 203 206 / 50%);
}
.yesfoot1{
    display: none;
}
@media only screen and (max-width: 875px) {
    .nofoot{
        display: none;
    }
    .yesfoot1{
        padding-left: 13px;
        display: block;
    }
    .text-middle{
        justify-content: center;
    }
}
.padding-foot{
    padding-bottom: 80px;
}

.foot-link-mini{
    color: #80847f;
    padding-left: 0;
}

@media only screen and (max-width: 550px) {
    .foot-link-mini{
        font-size: 10px;
    }
}
    

</style>