<template>
  <div class="placeholder-glow mx-4 my-4 service-card-container">
    <div
      v-if="isLoading"
      class="placeholder col-12 w-100 placeholder-element"
    ></div>
    <div v-else class="card service-card w-100 h-100" @click="onCardClicked">
      <!-- Card Image -->
      <img
        class="card-img-bottom service-card-img h-100"
        :src="serviceImagePath"
        alt="Card image cap"
      />
      <!-- Card Image Overlay -->
      <div
        class="card-img-overlay service-card-overlay custom-bg-black"
        style=""
      >
        <!-- Service Name  -->
        <h5 class="card-title text-white">{{ title }}</h5>
        <!-- More Info Button  -->
        <a
          :href="`/services/${serviceId}`"
          class="btn btn-custom-blue rounded rounded-pill right"
          >Maggiori Informazioni</a
        >
      </div>
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

      isLoading: true,
    };
  },
  mounted() {
    let imgPromise = new Promise((resolve, reject) => {
      const img = new Image();
      img.src = this.serviceImagePath;
      img.onload = resolve;
      img.onerror = reject;
    });
    imgPromise
      .then(() => {
        console.log("Image loaded!");
        this.isLoading = false;
      })
      .catch((error) => {
        console.error("Some image(s) failed loading!");
        console.error(error.message);
      });
  },
  methods: {
    //TODO add explanation
    onCardClicked() {
      this.$emit("serviceCardClicked", this.serviceId);
    },
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
.service-card-container {
  overflow: hidden;
  border-radius: 5px;

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
  transition: all 0.2s linear;
  &:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
    transform: scale(1.01);
  }
  .service-card,
  .placeholder-element {
    border-color: transparent !important;
    background-color: grey;
    aspect-ratio: 16/9;
    width: 100%;
    overflow: hidden;
    cursor: pointer;
    .service-card-img {
      object-fit: cover;
    }
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
}
</style>