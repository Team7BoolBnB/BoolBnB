<template>
    <div class="card card_debug w-100 fixed pb-3">
        <div class="py-2 px-2">
            <h5 class="text-uppercase text-center">Contatta l'host</h5>
            <form action="">
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nameInput"
                        placeholder="John Doe">
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="emailInput"
                        placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="messageInput" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="messageInput" rows="4" style="height: 6rem;"></textarea>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="basicBtn primaryBtn bigBtn">Submit</button>
                </div>
            </form>
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
    top: calc($navBarHeight + 2rem) !important;
    z-index: 1 !important;
    width: 100%;
    display: inline-block !important;
}

.card_debug {
    background-color: #ffffff;
    border-radius: 1rem;
    padding: 1rem;
}
</style>