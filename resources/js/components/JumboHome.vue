<template>
  <section class="container">
    <div class="row p-5 align-items-center">
      <div class="col-md-6">
        <div class="jumbo-text">
          <div class="w-75 mb-20">
            <span class="mb-5">LET'S GO</span>
            <h1 class="display-4 mb-10">
              Trova il <br />
              <span class="text-primary">miglior dottore</span> <br />
              nella tua zona
            </h1>
            <p>
              Tramite il nostro sito potrai visualizzare e prenotare i migliori
              specialisti per ogni settore medico
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
        <div class="jumbo-img text-center w-100">
          <img src="/img/home_image.jpg" alt="jumbo-home-img" class="w-100" />
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

<style lang="scss" scoped>
.jumbo-img {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);
  border-radius: 35%;
  overflow: hidden;
  .jumbo-home-img {
    object-fit: fill;
  }
}
</style>
