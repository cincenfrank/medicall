<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-text text-truncate mb-0 fw-bold">{{ review.title }}</h5>
      <p class="card-text text-truncate">"{{ review.content }}"</p>
      <h5 class="card-text mb-0">
        Dr. {{ review.user.last_name }} {{ review.user.first_name }}
      </h5>
      <p class="card-text fw-bold">{{ review.rating }}/5</p>
      <p class="card-text fst-italic">
        Recensito da:
        {{ review.reviewer_name }}
      </p>
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