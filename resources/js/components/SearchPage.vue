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
      <Carousel
        :visibleItemsNumber="1"
        :visibleItemsNumberSm="1"
        :visibleItemsNumberMd="2"
        :visibleItemsNumberLg="3"
        :visibleItemsNumberXL="4"
      >
        <div
          class="carousel-element"
          v-for="num in servicesArray"
          :key="num.id + 'service card'"
        >
          <CardService
            :title="num.name"
            :imgPath="'/' + num.img_path"
            :serviceId="num.id"
            :slug="num.slug"
            @serviceCardClicked="onServiceSelected"
          ></CardService></div
      ></Carousel>
    </div>

    <div v-if="doctorsArray">
      <!-- <div class="row row-cols-3">
        <div class="col-lg-4">
          <h2>Elenco dei Dottori</h2>
        </div>
        <div class="col flex-grow-0">
          <span
            v-if="activeServiceFilter"
            class=""
          >
            di
          </span>
        </div>
        <div class="col flex-grow-0">
          <CustomChip
            v-if="activeServiceFilter"
            :title="activeServiceFilter.title"
            :slug="activeServiceFilter.slug"
            @cancelClicked="onFilterCanceled"
          ></CustomChip>
        </div>
      </div> -->
      <div class="lh-base text-center text-md-start">
        <h2 class="d-inline-block mb-0 align-middle">Elenco dei Dottori</h2>

        <span v-if="activeServiceFilter" class="d-inline-block ms-2 align-middle"> di </span>
        <div class="d-inline-block align-middle">
          <CustomChip
            v-if="activeServiceFilter"
            :title="activeServiceFilter.title"
            :slug="activeServiceFilter.slug"
            @cancelClicked="onFilterCanceled"
          ></CustomChip>
        </div>
      </div>

      <div
        class="
          row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4
          justify-content-center
        "
      >
        <div
          v-for="doctor in doctorsArray"
          :key="doctor.id + ' doctor card'"
          class="col g-0"
        >
          <card-doctor :doctor="doctor"></card-doctor>
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
import CustomChip from "./partials/CustomChip.vue";
import CustomFilter from "./partials/CustomFilter.vue";
import Pagination from "./partials/Pagination.vue";
export default {
  components: {
    CustomFilter,
    CardService,
    CardDoctor,
    Carousel,
    Pagination,
    CustomChip,
  },
  data() {
    return {
      textQuery: "",
      servicesArray: [],
      doctorsArray: null,
      currentPage: 1,
      totalPages: null,
      activeServiceFilter: null,
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
    onDoctorSelected(doctorSlug) {
      window.axios.get(`/api/filter/doctors/${doctorSlug}`).then((resp) => {
        this.servicesArray = resp.data.data[0].services;
        this.doctorsArray = resp.data.data;
      });
    },
    onServiceSelected(serviceSlug) {
      window.axios.get(`/api/filter/services/${serviceSlug}`).then((resp) => {
        // this.servicesArray = resp.data;
        this.doctorsArray = resp.data[0].users.data;
        this.currentPage = 1;
        this.totalPages = resp.data[0].users.last_page;
        this.activeServiceFilter = {
          title: resp.data[0].name,
          slug: resp.data[0].slug,
        };
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
    onFilterCanceled() {
      this.activeServiceFilter = null;
      this.initData();
    },
    initData() {
      if (this.query) {
        this.textQuery = this.query;
      }
      this.getServices();
      this.getDoctors();
    },
  },
  mounted() {
    this.initData();
  },
};
</script>
<style lang="scss" scoped></style>
