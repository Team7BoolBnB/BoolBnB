<template>
  <div class="border">
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container-fluid  small-device-nav">
          <!-- logo -->
          <div class="row">
            <div class="col">
              <a class="navbar-brand" href="/">
                <img src="/img/logo.png" alt="BoolBnb Logo" width="120" />
              </a>
            </div>
            <div class="col">
              <button
                class="float-end navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarText"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
              <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </div>
          <div class="collapse navbar-collapse dropdown-style" id="navbarNavDropdown">
          <div class="flex-grow-1 text-center">
            <button
              type="button"
              class="basicBtn smallBtn primaryBtn"
              data-bs-toggle="modal"
              data-bs-target="#prova"
            >
            <i class="fa-solid fa-magnifying-glass"></i><span class="ms-2 filterModal">Start searching</span>
            </button>
          </div>

          <!-- user -->
          <div class="user-space login-view btn-group">
            <div class=" hover-log link-log border border-secondary border-opacity-10 rounded-pill d-flex align-items-center">
              <button v-if="!user" type="button" class="btn dropdown-toggle dropdown-toggle-split border-0" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="p-1 px-2">
                  <i class="fa-solid fa-bars"></i>
                </div>
              </button>
              <button v-if="!user" type="button" class="btn p-0 border-0">
                <div class="p-1">
                  <i class="p-2 border border-dark rounded-circle border-opacity-10 fa-solid fa-user"></i>
                </div>
              </button>
              <button v-else type="button" class="btn p-0 border-0 d-flex align-items-center">
                <div class="px-2">Ciao {{user.name}}</div>
                <div class="p-1">
                  <a href="/admin"><i class="nav-link p-2 border border-dark rounded-circle border-opacity-10 fa-solid fa-user"></i></a>
                </div>
              </button>
              
              <ul class="dropdown-menu dropdown-style-login">
                <li class="p-1"><a class="nav-link" href="/register"><i class="px-1 fa-solid fa-right-to-bracket"></i>Registrati</a></li>
                <li class="p-1"><a class="nav-link" href="/login"><i class="px-1 fa-solid fa-door-open"></i>Accedi</a></li>
                <hr>
            </ul>
            </div>
            
            
          </div>
          <div class="justify-content-center login-no">
            <ul class="p-0 list-unstyled d-flex">
              <li class="p-1"><a class="nav-link" href="/admin"><i class="px-1 fa-solid fa-right-to-bracket"></i>Registrati</a></li>
              <li class="p-1"><a class="nav-link" href="/admin"><i class="px-1 fa-solid fa-clipboard-user"></i>Area Host</a></li>
              <li class="p-1"><a class="nav-link" href="/login"><i class="px-1 fa-solid fa-door-open"></i>Accedi</a></li>
            </ul>
          </div>
          </div>
          <!-- menu -->
          <!-- <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarText">
                    <a class="nav-link" aria-current="page" href="#">Soggiorni</a>
                    <a class="nav-link" href="#">Esperienze</a>
                    <a class="nav-link" href="#">Esperienze Personali</a>
                </div> -->

          
        </div>
      </nav>
    </header>
  </div>
</template>

<script>
export default {
  data(){
    return{
      user : true
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../sass/partials/variables";

.border {
  border-top: 1px solid $tertiaryColor;
}

@media only screen and (max-width: 767px) {
    .small-device-nav{
      display: inline-block;
    }

    .dropdown-style{
    padding-top: 20px;
    background-color: white;
    border: solid white;
    border-radius: 0 0 20px 20px;
    box-shadow: 0px 28px 13px 0px #80808094;
    }
}

.dropdown-style-login{
    padding-top: 20px;
    background-color: white;
    border: solid white;
    border-radius: 0 0 20px 20px;
    box-shadow: 8px 12px 10px 0px #80808094;
    z-index: -1;
}

.user-space{
  padding-left: 100px;
}

.dropdown-toggle::after {
    display: none
}

.link-log{
  color: gray;
}
.hover-log:hover{
  box-shadow: 2px 5px 4px 0px #80808066;
  transition-duration: 0.5s, 1s;
}

</style>