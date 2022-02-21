<template>
  <!-- TODO add logic to limit buttons number when total pages number is greater than 10 -->
  <!-- Pagination List -->
  <ul class="pagination justify-content-center overflow-scroll">
    <!-- Previous Pagination List Item  -->
    <li class="page-item" @click="onPageClick(1)">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <!-- Pagination List Items  -->
    <li
      v-for="page in totalPages"
      :key="page"
      @click="onPageClick(page)"
      class="page-item"
      :class="page === currentPage ? 'active' : ''"
    >
      <a class="page-link" href="#">{{ page }}</a>
    </li>
    <!-- Next Pagination List Item  -->
    <li class="page-item" @click="onPageClick(totalPages)">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</template>

<script>
export default {
  name: "Pagination",
  props: {
    /**
     * Integer that indicates the actual page number
     */
    currentPage: Number,
    /**
     * Integer that indicates the total number of pages
     */
    totalPages: Number,
  },
  methods: {
    /**
     * Handle when the user clicks on a pagination element.
     *
     * @fires pageClicked when the user chooses a doctor
     */
    onPageClick(pageNumber) {
      this.$emit("pageClicked", pageNumber);
    },
  },
};
</script>

<style>
</style>