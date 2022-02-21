<template>
  <div class="overflow-hidden w-100" v-if="services.length > 0">
    <carousel class="" :visibleItemsNumber="3">
      <div
        class="carousel-element"
        v-for="service in services"
        :key="service.id"
      >
        <CardService
          :title="service.name"
          :imgPath="'/' + service.img_path"
          :serviceId="service.id"
        ></CardService>
      </div>
    </carousel>
  </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import CardService from "./partials/CardService.vue";
export default {
  name: "HomeServiceCarousel",
  components: { Carousel, CardService },
  data() {
    return {
      services: [],
    };
  },
  methods: {
    getSponsoredDoctors() {
      window.axios.get("/api/filter/services").then((res) => {
        this.services = res.data;
        console.log(res.data);
      });
    },
  },
  mounted() {
    //console.log(this.$route);
    this.getSponsoredDoctors();
  },
};
</script>

<style>
</style>