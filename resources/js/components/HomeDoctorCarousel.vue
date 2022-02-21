<template>
  <div class="overflow-hidden w-100" v-if="doctors.length > 0">
    <carousel class="" :visibleItemsNumber="5">
      <div class="carousel-element" v-for="doctor in doctors" :key="doctor.id">
        <card-doctor class="" :doctor="doctor"></card-doctor>
      </div>
    </carousel>
  </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import CardDoctor from "./partials/CardDoctor.vue";
export default {
  components: { Carousel, CardDoctor },
  data() {
    return {
      doctors: [],
    };
  },
  methods: {
    getSponsoredDoctors() {
      window.axios.get("/api/doctors/sponsored").then((res) => {
        this.doctors = res.data;
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