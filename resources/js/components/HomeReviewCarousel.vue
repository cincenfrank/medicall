<template>
  <div class="overflow-hidden w-100" v-if="Object.keys(reviews).length > 0">
    <carousel :visibleItemsNumber="4">
      <div class="carousel-element" v-for="review in reviews" :key="review.id">
        <card-review :review="review"></card-review>
      </div>
    </carousel>
  </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import CardReview from "./partials/CardReview.vue";
export default {
  components: { Carousel, CardReview },
  data() {
    return {
      reviews: [],
    };
  },
  methods: {
    fetchReviewData() {
      window.axios.get("/api/reviews").then((resp) => {
        this.reviews = resp.data;
      });
    },
  },
  mounted() {
    //console.log(this.$route);
    this.fetchReviewData();
  },
};
</script>

<style>
</style>