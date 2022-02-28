<template>
  <div class="p-1 p-md-3 p-lg-5">
    <h1>Le recensioni dei tuoi pazienti</h1>
    <!-- <div class="container"> -->
    <!-- <h1>{{ loggedUserId }}</h1> -->
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-3">
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
