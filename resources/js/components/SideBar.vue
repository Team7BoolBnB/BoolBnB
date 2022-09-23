<template>
    <div class="sidebar_container">
        <h3 class="text-white">Filtri</h3>

        <div>
            <form action="">


                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="destinationInput" placeholder="scegli una destinazione">
                    <label for="destinationInput">Destinazione</label>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="dateInput"
                                placeholder="Data di arrivo">
                            <label for="dateInput">Data di arrivo</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="dateInput"
                                placeholder="Data di arrivo">
                            <label for="dateInput">Data di arrivo</label>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="numberAdult" placeholder="Data di arrivo">
                            <label for="numberAdult">Adulti</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="numberChild" placeholder="Data di arrivo">
                            <label for="numberChild">Bambini</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="numberAnimal" placeholder="Data di arrivo">
                            <label for="numberAnimal">Animali</label>
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
                    <label for="selectTypology">Tipo di alloggio</label>
                </div>

                <div class="check_container">
                    <h5>Servizi</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="wifiCheck">
                        <label class="form-check-label" for="wifiCheck">
                            WI-FI
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="kitchenCheck">
                        <label class="form-check-label" for="kitchenCheck">
                            Cucina
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="parkingCheck">
                        <label class="form-check-label" for="parkingCheck">
                            Parcheggio gratuito nella proprietà
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tubCheck">
                        <label class="form-check-label" for="tubCheck">
                            Vasca da bagno
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="panoramicCheck">
                        <label class="form-check-label" for="panoramicCheck">
                            Vista sul Mare
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
                            Riscaldamento
                        </label>
                    </div>
                </div>


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
    background: linear-gradient(0deg, rgba(65, 43, 157, 1) 0%, rgba(207, 35, 119, 1) 100%);
    min-width: 300px;
}

.check_container{
    padding: 0.5rem;
    border-radius: 0.25rem;
    background-color: white;
}
</style>