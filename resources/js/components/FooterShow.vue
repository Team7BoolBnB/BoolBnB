<template>
    <div class="footer_show">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <h6 class="mb-4">Assistance</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2" v-for="link1 in footerLinksAssistance" :key="link1.name">
                            <a :href="link1.href">{{link1.name}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <h6 class="mb-4">Host</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2" v-for="link2 in footerLinksHost" :key="link2.name">
                            <a :href="link2.href">{{link2.name}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <h6 class="mb-4">Boolbnb</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2" v-for="link3 in footerLinksBoolbnb" :key="link3.name">
                            <a :href="link3.href">{{link3.name}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default{
    data(){
        return {
            footerLinksAssistance: [
                { name: "Centro Assistenza", href: "javascript:void(0)" },
                { name: "Accessibilità per tutti", href: "javascript:void(0)" },
                { name: "Segnala problemi nel quartiere", href: "javascript:void(0)" },
                { name: "AirCover", href: "javascript:void(0)" },
                { name: "Opzioni di cancellazione", href: "javascript:void(0)" },
                { name: "Informazioni di sicurezza", href: "javascript:void(0)" },
                { name: "La nostra risposta all'emergenza COVID-19", href: "javascript:void(0)" },
            ],
            footerLinksHost: [
                { name: "Prova a ospitare", href: "javascript:void(0)" },
                { name: "Vai al forum della community", href: "javascript:void(0)" },
                { name: "AirCover per gli host", href: "javascript:void(0)" },
                { name: "Come ospitare responsabilmente", href: "javascript:void(0)" },
                { name: "Esplora le risorse per host", href: "javascript:void(0)" },
            ],
            footerLinksBoolbnb: [
                { name: "Newsroom", href: "javascript:void(0)" },
                { name: "Scopri le nuove funzionalità", href: "javascript:void(0)" },
                { name: "Investitori", href: "javascript:void(0)" },
                { name: "Fondatori", href: "javascript:void(0)" },
                { name: "Gift Card", href: "javascript:void(0)" },
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/partials/variables";

.primaryColorText {
    color: $primaryColor;
}

.footer_show{
    background-color: rgb(247, 247, 247) !important;
    border-top: 1px solid rgb(221, 221, 221) !important;

    a{
        color: black;
        text-decoration: none;

        &:hover{
            text-decoration: underline;
        }
    }
}
</style>