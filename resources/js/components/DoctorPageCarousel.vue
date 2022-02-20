<template>
  <div class="overflow-hidden w-100" v-if="Object.keys(doctorList).length > 0">
    <carousel :visibleItemsNumber="6">
      <div
        class="carousel-element"
        v-for="doctor in doctorList"
        :key="doctor.id"
      >
        <card-doctor class="mx-1" :doctor="doctor"></card-doctor>
      </div>
    </carousel>
  </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import CardDoctor from "./partials/CardDoctor.vue";
export default {
  components: { Carousel, CardDoctor },
  props: {
    doctorListProp: String,
  },
  data() {
    return {
      doctorList: [],
    };
  },
  methods: {},
  mounted() {
    this.doctorList = JSON.parse(this.doctorListProp);
  },
};
</script>

<style>
</style>