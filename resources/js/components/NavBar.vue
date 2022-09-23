<template>
    <div class="sticky-top border">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <div class="container d-flex justify-content-between">

                    <!-- logo -->
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="/img/logo.png" alt="BoolBnb Logo" width="120">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                            aria-label="Toggle navigation">
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
                        <a class="nav-link" aria-current="page" href="/admin">Passa alla modalità Host</a>
                        <div>avatar</div>
                    </div>

                </div>
            </nav>
        </header>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    @import "../../sass/partials/variables";
    
        .border{
            border-top: 1px solid $tertiaryColor;
        }
    
    
    </style>