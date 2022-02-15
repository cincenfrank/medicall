<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ review.title }}</h5>
      <h5 class="card-title">{{ review.user.first_name }}</h5>
      <p class="card-text fw-bolder">{{ review.rating }}/5</p>
      <p class="card-text fw-bolder fst-italic">
        {{ review.reviewer_name }}
      </p>
      <p class="card-text fst-italic">{{ review.reviewer_email }}</p>

      <p class="card-text fst-italic">{{ review.user_id }}</p>

      <!-- <p class="card-text">{{ review.content }}</p> -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    review: Object,
  },
};
</script>

<style lang="scss" scoped>
</style>