<template>
  <div class="p-5">
    <h1 class="py-3">Le Recensioni dei tuoi pazienti</h1>
    <!-- <div class="container"> -->
    <!-- <h1>{{ loggedUserId }}</h1> -->
    <div class="row row-cols-4 gy-3">
      <div class="col" v-for="review in reviews" :key="review.id">
        <card-review :review="review"></card-review>
      </div>
    </div>
    <!-- </div> -->
  </div>
</template>


<script>
import CardReview from "./partials/CardReview.vue";
export default {
  components: { CardReview },
  props: {
    loggedUserId: String,
  },
  data() {
    return {
      reviews: [],
    };
  },
  methods: {
    dashReviewData() {
      window.axios
        .get("/api/reviews/dashboard/" + this.loggedUserId)
        .then((resp) => {
          this.reviews = resp.data;
        });
    },
  },
  mounted() {
    //console.log(this.$route);
    this.dashReviewData();
  },
};
</script>

<style>
</style>
