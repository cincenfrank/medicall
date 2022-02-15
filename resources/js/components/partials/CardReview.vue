<template>
  <div>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- qui va il ciclo sulla card intera -->
        <div class="col" v-for="review in reviews" :key="review.id">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ review.title }}</h5>
              <!-- <h5 class="card-title">{{ user.name }}</h5> -->
              <p class="card-text fw-bolder">{{ review.rating }}/5</p>
              <p class="card-text fw-bolder fst-italic">
                {{ review.reviewer_name }}
              </p>
              <p class="card-text fst-italic">{{ review.reviewer_email }}</p>

              <p class="card-text fst-italic">{{ review.user_id }}</p>

              <p class="card-text">{{ review.content }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      reviews: [],
    };
  },
  methods: {
    fetchReviewData() {
      axios.get("/api/reviews").then((resp) => {
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

<style lang="scss" scoped>
</style>