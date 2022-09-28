<template>
  <div class="border">
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container d-flex justify-content-between">
          <!-- logo -->
          <div>
            <a class="navbar-brand" href="/">
              <img src="/img/logo.png" alt="BoolBnb Logo" width="120" />
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarText"
              aria-controls="navbarText"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>

          <!-- menu -->
          <!-- <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarText">
                    <a class="nav-link" aria-current="page" href="#">Soggiorni</a>
                    <a class="nav-link" href="#">Esperienze</a>
                    <a class="nav-link" href="#">Esperienze Personali</a>
                </div> -->

          <!-- user -->
          <div class="collapse navbar-collapse d-flex justify-content-end">
            <a class="nav-link" aria-current="page" href="/admin"
              >Passa alla modalità Host</a
            >
          </div>

          <button
            type="button"
            class="btn btn-outline-secondary queryButton"
            data-bs-toggle="modal"
            data-bs-target="#prova"
          >
          <svg fill="none" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m18 12c2.2091 0 4-1.7909 4-4 0-2.20914-1.7909-4-4-4-1.8638 0-3.4299 1.27477-3.874 3h-11.126c-.55228 0-1 .44772-1 1 0 .55229.44772 1 1 1h11.126c.4441 1.7252 2.0102 3 3.874 3zm-2-4c0 1.10457.8954 2 2 2s2-.89543 2-2-.8954-2-2-2-2 .89543-2 2zm-14 8c0-2.2091 1.79086-4 4-4 1.86384 0 3.42994 1.2748 3.87398 3h11.12602c.5523 0 1 .4477 1 1s-.4477 1-1 1h-11.12602c-.44404 1.7252-2.01014 3-3.87398 3-2.20914 0-4-1.7909-4-4zm6 0c0-1.1046-.89543-2-2-2s-2 .8954-2 2 .89543 2 2 2 2-.8954 2-2z" fill="rgb(0,0,0)" fill-rule="evenodd"/></svg>
            <span  class="ms-2 filterModal">Filtri</span>
          </button>
        </div>
      </nav>
    </header>
  </div>
</template>

<script>

export default {
 
};
</script>

<style lang="scss" scoped>
@import "../../sass/partials/variables";

.border {
  border-top: 1px solid $tertiaryColor;
}
</style>