<template>
  <!-- TODO decide if it might be better to use bootstrap col logic instead of visibleItemsNumber props for responsiveness  -->
  <!-- Carousel container with custom style in order to inject css variables -->
  <!-- :style="styleProps" -->
  <div class="carousel d-flex align-items-center position-relative">
    <!-- Flex row with overflow hidden in order to avoid the presence of the scrollbar
    and with a ref tag that is used to handle the scroll with js.
    If the number of items to display is lower than the number of items per row, the items will be centered -->
    <div
      class="row flex-nowrap overflow-hidden carousel-container w-100 mx-3"
      :class="[
        `row-cols-${visibleItemsNumber}`,
        visibleItemsNumberSm ? `row-cols-sm-${visibleItemsNumberSm}` : '',
        visibleItemsNumberMd ? `row-cols-md-${visibleItemsNumberMd}` : '',
        visibleItemsNumberLg ? `row-cols-lg-${visibleItemsNumberLg}` : '',
        visibleItemsNumberXL ? `row-cols-xl-${visibleItemsNumberXL}` : '',
        children.length < visibleItemsNumber ? 'justify-content-center' : '',
      ]"
      ref="scrolled"
    >
      <!-- @slot tag to accept carousel items -->
      <slot></slot>
    </div>
    <div
      class="btn btn-custom-blue position-absolute rounded rounded-circle"
      :class="children.length < visibleItemsNumber ? 'disabled' : ''"
      @click="onScrollRequested(false)"
    >
      &lt;
    </div>
    <div
      class="btn btn-custom-blue position-absolute end-0 rounded rounded-circle"
      :class="children.length < visibleItemsNumber ? 'disabled' : ''"
      @click="onScrollRequested(true)"
    >
      &gt;
    </div>
  </div>
</template>

<script>
import CardService from "./partials/CardService.vue";
export default {
  components: { CardService },
  props: {
    /**
     * Integer that the number of object that will be visible inside a single carousel screen
     */
    visibleItemsNumber: Number,
    visibleItemsNumberSm: Number,
    visibleItemsNumberMd: Number,
    visibleItemsNumberLg: Number,
    visibleItemsNumberXL: Number,
  },
  data() {
    return {
      /**
       * Variable that tracks the scroll position offset. It starts to 0 by default
       */
      scrollPosition: 0,
      /**
       * Array that contains the HTML elements passed to this components inside the slot tag.
       * It is populated on mounted.
       */
      children: [],
    };
  },
  methods: {
    /**
     * Triggers when the user clicks on a navigation button of the carousel.
     * Checks the scroll position and execute the requested scroll.
     *
     * @property {Boolean} isForward boolean that indicates if the requested scroll id forward (true) or backward (false).
     */
    onScrollRequested(isForward) {
      // get the html element of the container through ref attribute
      let element = this.$refs.scrolled;
      let singleItemWidth = element.scrollWidth / this.childrenCount;
      //   console.log("scrollWidth", element.scrollWidth);
      //   console.log("childrenCount", this.childrenCount);

      if (isForward) {
        // case when the user requested a forward scroll

        // calculates a new scroll position by adding to the actual position the result of the
        // multiplication between the space occupied by a single item and the number of items
        // that are visible in a single carousel screen
        console.log("window.innerWidth", window.innerWidth);
        console.log("this.actualVisibleItems()", this.actualVisibleItems());
        // console.log("actualVisibleItems", this.actualVisibleItems());
        const newScrollPosition =
          this.scrollPosition + singleItemWidth * this.actualVisibleItems();
        // console.log("newScrollPosition", newScrollPosition);

        // check the scroll position in order to avoid to obtain values bigger than the last useful
        // scroll width value, that is equal to the max scroll with - the size of a default carousel screen
        if (
          this.scrollPosition >
          element.scrollWidth - singleItemWidth * this.actualVisibleItems()
        ) {
          this.scrollPosition =
            element.scrollWidth - singleItemWidth * this.actualVisibleItems();
        } else {
          this.scrollPosition = newScrollPosition;
        }
      } else {
        // case when the user requested a forward scroll

        // calculates a new scroll position by subtracting to the actual position the result of the
        // multiplication between the space occupied by a single item and the number of items
        // that are visible in a single carousel screen
        const newScrollPosition =
          this.scrollPosition - singleItemWidth * this.actualVisibleItems();

        // check the scroll position in order to avoid to obtain values smaller than 0.
        if (newScrollPosition < 0) {
          this.scrollPosition = 0;
        } else {
          this.scrollPosition = newScrollPosition;
        }
      }

      // executes the scroll
      element.scrollTo({
        top: 0,
        left: this.scrollPosition,
        behavior: "smooth",
      });
    },
    /**
     * Initialize the children variables by creating a list of HTML objects that are children of the element
     * with the value of 'scrolled' in the ref attribute. This function is called on mounted
     */
    getChildren() {
      this.children = this.$refs.scrolled.children;
    },
    actualVisibleItems() {
      if (window.innerWidth < 576) return this.visibleItemsNumber;

      if (window.innerWidth < 768)
        return this.visibleItemsNumberSm ?? this.visibleItemsNumber;
      if (window.innerWidth < 992)
        return (
          this.visibleItemsNumberMd ??
          this.visibleItemsNumberSm ??
          this.visibleItemsNumber
        );
      if (window.innerWidth < 1200)
        return (
          this.visibleItemsNumberLg ??
          this.visibleItemsNumberMd ??
          this.visibleItemsNumberSm ??
          this.visibleItemsNumber
        );
      if (window.innerWidth >= 1200)
        return (
          this.visibleItemsNumberXL ??
          this.visibleItemsNumberLg ??
          this.visibleItemsNumberMd ??
          this.visibleItemsNumberSm ??
          this.visibleItemsNumber
        );

      return 3;
    },
  },
  computed: {
    /**
     * number of items that are passed in the slot tag
     */
    childrenCount() {
      return this.children.length;
    },

    /**
     * Object used to create a css variable to set the carousel's items width.
     * It is injected in the HTML code with a script tag
     */
    // styleProps() {
    //   return {
    //     "--carousel-item-width": 100 / this.visibleItemsNumber + "%",
    //   };
    // },
  },
  mounted() {
    /**
     * Initialize children variable
     */
    this.getChildren();
  },
};
</script>

<style lang="scss" scoped>
.carousel {
  .carousel-container {
    // & > * {
    //   width: var(--carousel-item-width);
    // }
    .carousel-element {
      flex-wrap: nowrap;
      flex-shrink: 0;
    }
  }
}
</style>
