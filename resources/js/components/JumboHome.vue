<template>
    <section class="container">
        <div class="row p-5">
            <div class="col-md-6">
                <div class="jumbo-text">
                    <div class="w-75 mb-20">
                        <span class="mb-5">LET'S GO</span>
                        <h1 class="display-4 mb-10">
                            Find the <br />
                            <span class="text-primary">best doctor</span> <br />
                            near you
                        </h1>
                        <p>
                            Tramite il nostro sito potrai visualizzare e
                            prenotare i migliori specialisti per ogni settore
                            medico
                        </p>
                    </div>
                    <div>
                        <!-- filter component here -->
                        <custom-filter
                            @doctorSelected="goToDoctorPage"
                            @serviceSelected="onServiceClicked"
                            @onSearched="onSearch"
                        >
                        </custom-filter>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="jumbo-img text-center">
                    <img
                        src="https://picsum.photos/300"
                        alt="jumbo-home-img"
                        class="rounded-circle"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import CustomFilter from "./partials/CustomFilter.vue";
export default {
    components: { CustomFilter },
    methods: {
        goToDoctorPage(doctorId) {
            window.location.replace(`/doctors/${doctorId}`);
        },
        onServiceClicked(serviceId) {
            window.location.replace(`/services/${serviceId}`);
        },
        onSearch(searchedText) {
            window.location.replace(`/search?query=${searchedText}`);
        },
    },
};
</script>

<style lang="scss" scoped></style>
