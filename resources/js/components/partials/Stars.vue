<template>
  <div>
    <slot></slot>
    <ul class="d-flex list-unstyled mb-0">
      <li v-for="i in 5" :key="i" class="rounded">
        <i
          class="text-warning single-star"
          :class="ratings >= i ? 'fas fa-star' : 'far fa-star'"
          aria-hidden="true"
        ></i>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      prova: "titolo di prova",
    };
  },
  props: {
    ratings: Number,
  },
  methods: {},
};
</script>

<style lang="scss" scoped>
.single-star {
  color: #c99f16;
  font-size: 18px;
  padding: 0 2px;
}
</style>
