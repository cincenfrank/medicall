<template>
  <card-review :review="review"> </card-review>
</template>

<script>
import CardReview from "./partials/CardReview.vue";
export default {
  components: { CardReview },
  props: {
    reviewString: String,
  },
  computed: {
    review() {
      return JSON.parse(this.reviewString);
    },
  },
};
</script>

<style>
</style>