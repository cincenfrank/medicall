<template>
  <div>
    <!-- quì va il service img_path -->
    <div
      class="container-fluid position-relative"
      style="background-color: #add8e6; height: 300px"
    >
      <h1 class="mb-0 position-absolute top-50 start-50 translate-middle">{{ service.name }}</h1>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      service: "",
    };
  },
  methods: {
    fetchServiceData() {
      const url = window.location.href;
      const lastParam = url.split("/").slice(-1)[0];

      axios.get("/api/service/" + lastParam).then((resp) => {
        this.service = resp.data;
      });
    },
  },
  mounted() {
    //console.log(this.$route);
    this.fetchServiceData();
  },
};
</script>

<style lang="scss" scoped>
</style>