<template>
    <div class="card card_debug w-100 fixed pb-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-danger">FORM MESSAGGI</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                of
                the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
</template>

<script>

export default {

}

</script>

<style lang="scss" scoped>
@import "../../sass/partials/variables";

.primaryColorText {
    color: $primaryColor;
}

.fixed {
    position: sticky !important;
    top: calc(70px + 2rem) !important;
    z-index: 1 !important;
    width: 100%;
    display: inline-block !important;
    padding-right: 1px !important;
}

.card_debug {
    background-color: #ffffff;
    border-radius: 1rem;
    padding: 1rem;
}
</style>