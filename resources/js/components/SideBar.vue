<template>
    <div class="sidebar_container border">
        <h3>Filters</h3>

        <div>
            <form action="">


                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="destinationInput" placeholder="scegli una destinazione">
                    <label for="destinationInput">Destination</label>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="dateArrivalInput"
                                placeholder="Data di arrivo">
                            <label for="dateArrivalInput">Check-in date</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="dateDDepartureInput"
                                placeholder="Data di arrivo">
                            <label for="dateDDepartureInput">Check-out date</label>
                        </div>
                    </div>
                </div>


                <div class="form-floating mb-3">
                    <select class="form-select" id="selectTypology" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="selectTypology">Type of accommodation</label>
                </div>

                <div class="row g-2 mb-3">
                    <h5>Accommodation details</h5>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="numberRooms" >
                            <label for="numberRooms">Rooms</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="numberBeds" >
                            <label for="numberBeds">Beds</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="numberBathrooms" >
                            <label for="numberBathrooms">Bathrooms</label>
                        </div>
                    </div>
                </div>

                <div class="check_container">
                    <h5>Services</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="wifiCheck">
                        <label class="form-check-label" for="wifiCheck">
                            WI-FI
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="kitchenCheck">
                        <label class="form-check-label" for="kitchenCheck">
                            Kitchen
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="parkingCheck">
                        <label class="form-check-label" for="parkingCheck">
                            Free parking on the property
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tubCheck">
                        <label class="form-check-label" for="tubCheck">
                            Bath tub
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="panoramicCheck">
                        <label class="form-check-label" for="panoramicCheck">
                            Sea-view
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tvCheck">
                        <label class="form-check-label" for="tvCheck">
                            TV
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="heatingCheck">
                        <label class="form-check-label" for="heatingCheck">
                            Heating
                        </label>
                    </div>
                </div>


                <button type="submit" class="basicBtn bigBtn primaryBtn mt-5">Search</button>

            </form>
        </div>
    </div>
</template>

<script >

export default {

}
</script>

<style lang="scss" scoped>
@import "../../sass/partials/variables";
@import "../../sass/partials/styleguide";

.sidebar_container {
    padding: 1.5rem;
    /* background: linear-gradient(0deg, rgba(65, 43, 157, 1) 0%, rgba(207, 35, 119, 1) 100%); */
    max-width: 400px;
    background-color: white;
    border-right: 1px solid $tertiaryColor;
}

.check_container{
    padding: 0.5rem;
    border-radius: 0.25rem;
    border: 1px solid #71717166;
    background-color: #f8fafc;
}

.border{
    /* border-right: 1px solid $tertiaryColor; */
}
</style>