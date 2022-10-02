<template>
    <div class="pb-5">
        <div class="container">
                <div class="col">
                    <a href="#" class="text-decoration-none text-reset">
                        <div class="publicCardImage d-flex justify-content-center align-items-center mb-3">
                            <!-- <img :src="require(`storage/` + accommodation.image)" alt="Card image"> -->
                            <img :src="'/storage/' + accommodation.image" alt="Card image">
                        </div>
                        <div>
                            <h5 class="overflow-hidden">{{accommodation.title}}</h5>
                            <span class="publicCardTitle">{{accommodation.address}}</span>
                        </div>
                    </a>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['accommodation'],
}
</script>

<style lang="scss" scoped>

@import "../../sass/partials/variables";

h5 {
    color: $quaternaryColor;
}


</style>