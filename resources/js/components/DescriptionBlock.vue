<template>
  <div>
    <div class="container">
      <div class="row">
        <p class="mt-5">
          {{ service.description }}
        </p>
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