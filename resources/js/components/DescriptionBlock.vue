<template>
  <div>
    <div class="container">
      <div class="row">
        <h3 class="mt-5">
          {{ service.description }}
        </h3>
      </div>
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
    fetchService() {
      const url = window.location.href;
      const lastParam = url.split("/").slice(-1)[0];

      axios.get("/api/service/" + lastParam).then((resp) => {
        this.service = resp.data;
      });
    },
  },
  mounted() {
    //console.log(this.$route);
    this.fetchService();
  },
};
</script>

<style lang="scss" scoped>
</style>