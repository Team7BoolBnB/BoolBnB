<template>
    <div>
        <header class="border">
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <div class="container d-flex justify-content-between">
                    <!-- logo -->
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="/img/logo.png" alt="BoolBnb Logo" width="120" />
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <!-- link per muoversi dentro lo show -->
                    <div>
                        <ul class="list-unstyled d-flex gap-3 mb-0">
                            <li>
                                <a class="nav-link" href="#sectionPhoto">Foto</a>
                            </li>
                            <li>
                                <a class="nav-link" href="#sectionServices">Servizi</a>
                            </li>
                            <li>
                                <a class="nav-link" href="#sectionInfo">Informazioni</a>
                            </li>
                        </ul>
                    </div>

                    <!-- bottone per arrivare alla card form -->
                    <div class="d-flex justify-content-end">
                        <a class="basicBtn primaryBtn bigBtn" aria-current="page" href="#sectionForm">Contatta l'host</a>
                    </div>

                </div>
            </nav>
        </header>
    </div>
</template>

<script >

export default {
    /* data(){
        return{
            view: {
                scroll: true,
            }
        }
    },
    
    beforeMount() {
    window.addEventListener('scroll', this.backgroundNavBar)
    },

    methods:{
        backgroundNavBar(element) {
            if(window.scrollY) {
                this.view.scroll = false;
                element = document.getElementById("navScroll");
                element.classList.add("d-none");
            } else {
                this.view.scroll = true;
                element = document.getElementById("navScroll");
                element.classList.remove("d-none");
            }
        },
    } */
}
</script>

<style lang="scss" scoped>

/* .scroll {
    padding: 1rem;
    position: absolute;
    top: -70px;
    right: 0;
    left: 0;
    z-index: 9999;
    scroll-behavior: smooth;
    display: block;
} */
</style>