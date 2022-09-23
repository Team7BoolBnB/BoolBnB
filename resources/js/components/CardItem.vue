<template>
    <div>
        <a href="#" class="text-decoration-none text-reset">
            <div class="publicCardImage d-flex justify-content-center align-items-center mb-3">
                <img :src="accommodation.image" alt="Card image">
            </div>
            <div>
                <h5>{{accommodation.title}}</h5>
                <span class="publicCardTitle">{{accommodation.address}}</span>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    props: ['accommodation'],
}
</script>

<style>

</style>