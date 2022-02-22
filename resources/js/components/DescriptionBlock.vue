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
// import axios from "axios";

export default {
  props: { serviceProp: String },
  data() {
    return {
      service: {},
    };
  },
  methods: {
    // fetchService() {
      // const url = window.location.href;
      // // const lastParam = url.split("/").slice(-1)[0];
      // const lastParam = url.split("/").pop();
      // // http://127.0.0.1:8000/services/allergologia
      // // ['http:', '', '127.0.0.1:8000', 'services', 'allergologia']
      // // ['allergologia']
      // // allergologia

      // axios.get("/api/service/" + lastParam).then((resp) => {
      //   this.service = resp.data;
      // });
    // },
  },
  mounted() {
    // this.fetchService();
    this.service = JSON.parse(this.serviceProp);
  },
};
</script>

<style lang="scss" scoped>
</style>