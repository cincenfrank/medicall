<template>
  <!-- TODO add comments -->
  <div class="container">
    <h1>La tua Ricerca</h1>

    <CustomFilter
      @onSearched="onSearched"
      @doctorSelected="onDoctorSelected"
      @serviceSelected="onServiceSelected"
    ></CustomFilter>
    <div v-if="servicesArray.length > 0" class="my-4">
      <h2>Filtra per Servizio</h2>
      <Carousel :visibleItemsNumber="4">
        <div
          class="carousel-element"
          v-for="num in servicesArray"
          :key="num.id + 'service card'"
        >
          <CardService
            :title="num.name"
            :imgPath="'/' + num.img_path"
            :serviceId="num.id"
            @serviceCardClicked="onServiceSelected"
          ></CardService></div
      ></Carousel>
    </div>
    <div v-if="doctorsArray">
      <h2>Elenco dei Dottori</h2>
      <div class="row justify-content-center">
        <div
          v-for="doctor in doctorsArray"
          :key="doctor.id + ' doctor card'"
          class="col-3 g-0"
        >
          <card-doctor :doctor="doctor"> </card-doctor>
        </div>
      </div>
      <Pagination
        :currentPage="currentPage"
        :totalPages="totalPages"
        v-on:pageClicked="changeCurrentPage"
      ></Pagination>
    </div>
  </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import CardDoctor from "./partials/CardDoctor.vue";
import CardService from "./partials/CardService.vue";
import CustomFilter from "./partials/CustomFilter.vue";
import Pagination from "./partials/Pagination.vue";
export default {
  components: { CustomFilter, CardService, CardDoctor, Carousel, Pagination },
  data() {
    return {
      textQuery: "",
      servicesArray: [],
      doctorsArray: null,
      currentPage: 1,
      totalPages: null,
    };
  },
  props: {
    query: String,
  },
  methods: {
    onSearched(searchedText) {
      this.textQuery = searchedText;
      this.getServices();
      this.getDoctors(true);
    },
    onDoctorSelected(doctorId) {
      window.axios.get(`/api/filter/doctors/${doctorId}`).then((resp) => {
        this.servicesArray = resp.data.data[0].services;
        this.doctorsArray = resp.data.data;
      });
    },
    onServiceSelected(serviceId) {
      window.axios.get(`/api/filter/services/${serviceId}`).then((resp) => {
        this.servicesArray = resp.data;
        this.doctorsArray = resp.data[0].users.data;
        this.currentPage = 1;
        this.totalPages = resp.data[0].users.last_page;
      });
    },
    getServices() {
      window.axios
        .get(`/api/filter/services?text=${this.textQuery}`)
        .then((resp) => {
          this.servicesArray = resp.data;
        });
    },
    changeCurrentPage(pageNumber) {
      if (pageNumber !== this.currentPage) {
        this.currentPage = pageNumber;
        this.getDoctors();
      }
      // console.log(this.currentPage);
    },
    getDoctors(resetPage = false) {
      if (resetPage) {
        this.currentPage = 1;
      }
      window.axios
        .get(
          `/api/filter/doctors?text=${this.textQuery}&page=${this.currentPage}`
        )
        .then((resp) => {
          this.doctorsArray = resp.data.data;
          this.totalPages = resp.data.last_page;
        });
    },
  },
  mounted() {
    if (this.query) {
      this.textQuery = this.query;
    }
    this.getServices();
    this.getDoctors();
  },
};
</script>
<style lang="scss" scoped></style>
