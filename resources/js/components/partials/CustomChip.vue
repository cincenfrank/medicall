<template>
  <div
    class="
      custom-chip
      bg-primary
      p-2
      rounded rounded-pill
      d-flex
      align-items-center
      ms-3
    "
  >
    <p class="text-small d-inline-block text-white p-0 m-0">{{ title }}</p>
    <span class="mx-2 text-small" @click="onCancelClicked">❌</span>
  </div>
</template>

<script>
export default {
  name: "CustomChip",
  props: {
    title: String,
    slug: String,
  },
  methods: {
    onCancelClicked() {
      this.$emit("cancelClicked", this.slug);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>