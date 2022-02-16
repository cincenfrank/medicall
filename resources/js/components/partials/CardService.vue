<template>
  <div class="card service-card w-100">
    <!-- Card Image -->
    <img class="card-img-bottom" :src="serviceImagePath" alt="Card image cap" />
    <!-- Card Image Overlay -->
    <div class="card-img-overlay service-card-overlay custom-bg-black" style="">
      <!-- Service Name  -->
      <h5 class="card-title text-white">{{ title }}</h5>
      <!-- More Info Button  -->
      <a href="#" class="btn btn-custom-blue rounded rounded-pill right"
        >Maggiori Informazioni</a
      >
    </div>
  </div>
</template>

<script>
export default {
  props: {
    /**
     * String that represents the service name
     */
    title: String,
    /**
     * Integer that represents the path of the service image
     */
    imgPath: String,
    /**
     * Integer that indicates the id of the service
     */
    serviceId: Number,
  },
  data() {
    return {
      /**
       * Default image path to be used when the prop imgPath is null
       */
      defaultImagePlaceholder: "/img/bg-login.jpg",
    };
  },
  computed: {
    /**
     * Represents the image that will be displayed. Id imgPath is null it returns the default placeholder
     */
    serviceImagePath() {
      return this.imgPath ? this.imgPath : this.defaultImagePlaceholder;
    },
  },
};
</script>

<style lang="scss" scoped>
.service-card {
  overflow: hidden;
  cursor: pointer;
  .btn-custom-blue {
    opacity: 1;
    transition: all 0.2s linear;
    &.left {
      transform: translateX(-140%);
    }
    &.right {
      transform: translateX(+140%);
      align-self: flex-end;
    }
  }
  .service-card-overlay {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
  }
  &:hover {
    .btn-custom-blue {
      opacity: 1;
      transform: translateX(0px);
    }
  }
}
.custom-bg-black {
  background-color: rgba(0, 0, 0, 0.429);
}
</style>