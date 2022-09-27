<template>
    <div>
        <div class="publicCardImage d-flex justify-content-center align-items-center mb-3">
            <img :src="accommodation.image" :alt="'Image of '+ accommodation.title">
            <!-- <img :src="require(`storage/accommodation` + accommodation.image)" alt="Card image"> -->
            <!-- <img :src="asset ('storage/' + accommodation.image )" alt="Card image"> -->
        </div>
        <div>
            <h5 class="overflow-hidden">{{accommodation.title}}</h5>
            <span class="publicCardTitle">{{accommodation.address}}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: ['accommodation'],
}
</script>

<style>

</style>