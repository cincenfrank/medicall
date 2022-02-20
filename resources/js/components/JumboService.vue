<template>
  <div v-if="service.img_path" class="jumbo-service">
    <!-- quì va il service img_path -->
    <img :src="'/' + service.img_path" class="jumbo-service-img" alt="" />
    <div
      class="
        container
        position-absolute
        top-50
        start-50
        translate-middle
        d-flex
        justify-content-center
      "
    >
      <h1 class="jumbo-service-title">
        {{ service.name }}
      </h1>
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
.jumbo-service {
  position: relative;
  height: 500px;
  .jumbo-service-img {
    height: 100%;
    width: 100%;
    object-fit: cover;
  }
  .jumbo-service-title {
    // mb-0 text-center text-white bg-black d-inline-block
    margin-bottom: 0;
    text-align: center;
    color: white;
    display: inline-block;
    padding: 20px;
    border-radius: 50px;
    background-color: rgba(0, 0, 0, 0.3);
    font-size: 65px;
  }
}
</style>