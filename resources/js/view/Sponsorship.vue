<template>
    <div>
        <div>

            <main class="d-flex herobunner">
                <div class="creationCol leftCol nodisplay">
                    <div class="logoCol">
                        <img src="/img/logo-light.png" alt="Logo BoolBnb" width="120">
                    </div>
                    <div class="h-100 d-flex align-items-center">
                        <h1 class="text-white">New Sponsorship</h1>
                    </div>
                </div>
                <div class="creationCol leftCol yesdisplay1">
                    <div class="logoCol">
                        <img src="/img/logo-light.png" alt="Logo BoolBnb" width="120">
                    </div>
                    <div class="h-100 d-flex align-items-center">
                        <h1 class="text-white">New Sponsorship</h1>
                    </div>
                </div>
                <div class="creationCol rightCol">

                    <!-- codice del create -->
                    <div v-if="dataSubmit">

                        <div class="row">
                            <div class="col-12">
                                <div class="text-end pb-5">
                                    <a href="/admin/sponsorship" class="textLink me-2">
                                        <i class="fa-solid fa-arrow-left pe-2"></i>
                                        <span class="nodisplay">Back to sponsorships</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-5 mb-4">Which accommodation you want to sponsor?</h5>

                        <select v-model="accommodation_id" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example" name="accommodation_id" required="required">
                            <option v-for="item in accommodations" :key="item.id" class="" :value="item.id">{{
                            item.title }} - {{ item.address }}</option>
                        </select>

                        <div class="row row-cols-lg-2 row-cols-sm-1 sponsortime">
                            <div class="col-6">
                                <h5 class="mt-5 mb-4">Start date</h5>
                                <input v-model="date" type="datetime-local" id="startTime" name="startTime">
                            </div>

                            <div class="col-6">
                                <h5 class="mt-5 mb-4">Duration</h5>
                                <select v-model="sponsorship_id" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" name="sponsorship_id">
                                    <option v-for="item in sponsorships" :key="item.period" class="" :value="item.id">{{
                                    item.name }} - {{ item.period }}h</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center py-5">
                            <button v-if="date && sponsorship_id && accommodation_id &&checkDate"
                                class="basicBtn bigBtn primaryBtn" @click="gocheckout()">Purchase</button>
                            <button v-else class="basicBtn bigBtn primaryBtn" v-on:click="change()">Purchase</button>
                        </div>

                        <div v-if="alert " class="alert alert-danger text-center w-50 mx-auto mt-3" role="alert">
                            <span>Enter all the required data</span>
                        </div>
                        <div v-if="date && sponsorship_id && accommodation_id && !checkDate"
                            class="alert alert-danger text-center w-50 mx-auto mt-3" role="alert">
                            <span>Enter a valid date from which to start the sponsorship</span>
                        </div>
                    </div>

                    <!-- checkout -->
                    <div v-if="checkout"
                        class="container  d-flex justify-content-center align-items-center flex-column py-5">
                        <div class="cardCheckout gradient-border">
                            <h2 class="py-4 text-center mb-3">CHECKOUT</h2>
                            <h4 class="mb-3">You are sponsoring: 
                                <span
                                    class="fst-light fst-italic">{{accommodationName}} 
                                </span>
                            </h4>
                            <h4 class="mb-3">Service Name: 
                                <span
                                    class="fst-light fst-italic">{{sponsorshipName}}
                                </span> 
                            </h4>
                            <h4 class="mb-3">Start date: <span class="fst-light fst-italic"> {{date}}</span></h4>
                            <h4 class="mb-3">Sponsorship duration: <span class="fst-light fst-italic">{{time}}
                                    h</span></h4>
                            <h4 class="mb-3">Price: <span class="fst-light fst-italic"> {{price}} €</span></h4>
                            <div class="d-flex justify-content-between py-4">
                                <a class="basicBtn bigBtn secondaryBtn"
                                    href="/admin/sponsorship/create/buy">Back</a>
                                <router-link
                                    :to="{ name: 'sponsorship.payment' , params : { date:date , sponsorship_id:sponsorship_id , accommodation_id:accommodation_id} } ">
                                    <button class="basicBtn bigBtn primaryBtn">Continue</button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    data() {
        return {
            accommodations: null,
            sponsorships: null,
            accommodation_id: null,
            sponsorship_id: null,
            price: null,
            sponsorshipName: null,
            accommodationName: null,
            time: null,
            date: null,
            alert: false,
            checkout: false,
            dataSubmit: true,
            nowDate: null,
            checkDate: null
        }
    },
    methods: {
        fetchdata() {
            axios.get("/api/accommodations/sponsorship").then((resp) => {
                this.accommodations = resp.data.accommodations,
                    this.sponsorships = resp.data.sponsorships
            })
        },
        change() {
            if (!this.dataCheck || !this.accommodation_id || !this.sponsorship_id) {
                this.alert = true
            }

        },
        gocheckout() {
            this.dataSubmit = false;
            this.checkout = true
        },

    },

    mounted() {
        this.fetchdata();
        let today = new Date();
        let date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        let dateTime = date + ' ' + time;
        this.nowDate = dateTime;
    },

    watch: {
        sponsorship_id(newValue) {
            this.sponsorships.forEach(value => {

                if (newValue == value.id) {
                    this.price = value.price;
                    this.time = value.period;
                    this.sponsorshipName = value.name;
                }
            });
            if (newValue) {
                this.alert = false
            }

        },
        accommodation_id(newValue) {
            this.accommodations.forEach(value => {

                if (newValue == value.id) {
                    this.accommodationName = value.title;

                }
            });
            if (newValue) {
                this.alert = false
            }

        },
        date(newValue) {
            const date1 = new Date(this.nowDate);
            const date2 = new Date(this.date);
            const diffTime = Math.floor(date2 - date1);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays > 0) {
                this.checkDate = true
                this.alert = false
            }
        }
    }

}
</script>

<style lang="scss" scoped>
@import "../../sass/partials/variables";

:root {
    --borderWidth: 7px;
    --borderRadius: 2rem;
}

.paymentContainer {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.cardCheckout {
    padding: 2rem 6rem;
    background-color: white;
}

.gradient-border {
    --borderWidth: .5rem;
    position: relative;
    border-radius: var(--borderWidth);

    &:after {
        content: '';
        position: absolute;
        top: calc(-1 * var(--borderWidth));
        left: calc(-1 * var(--borderWidth));
        height: calc(100% + var(--borderWidth) * 2);
        width: calc(100% + var(--borderWidth) * 2);
        background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
        border-radius: calc(2 * var(--borderWidth));
        z-index: -1;
        animation: animatedgradient 4s ease alternate infinite;
        background-size: 300% 300%;
    }

    @keyframes animatedgradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
}

</style>
