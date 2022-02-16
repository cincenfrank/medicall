<template>
  <div>
    <div class="container">
      <h1>{{ loggedUserId }}</h1>
      <div class="row">
        <card-review
          class="col-3"
          v-for="review in reviews"
          :key="review.id"
          :review="review"
        ></card-review>
      </div>
    </div>
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
      window.axios.get("/api/reviews/dashboard/" + this.loggedUserId).then((resp) => {
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
