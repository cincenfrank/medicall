<template>
  <!-- TODO add logic to use up, down and enter keys on suggestions List -->
  <div class="custom-filter d-flex">
    <!-- Input Search Bar - disabled autocomplete to avoid conflicts with suggestions list logic -->
    <input
      type="text"
      autocomplete="off"
      class="form-control custom-filter-input"
      placeholder="Digita il nome di un dottore o di una specializzazione"
      v-model="filterText"
      @keyup.enter="onSearch"
    />

    <!-- Suggestions List -->
    <ul class="list-group custom-filter-suggestions">
      <!-- Suggestions List Element -->
      <li
        v-for="element in suggestionsList"
        :key="element.id + element.type + 'filter'"
        class="list-group-item"
        @click="onSuggestionsClick(element)"
      >
        <!-- if suggestions element is a doctor shows 🩺 otherwise shows 💊 -->
        <span>{{ element.type === "doctor" ? "🩺" : "💊" }} - </span>
        <!-- display doctor or service name -->
        {{ element.name }}
      </li>
    </ul>
    <!-- Search Button, on search triggers "onSearch" method -->
    <div
      class="btn btn-custom-blue"
      :class="this.filterText.length <= 2 ? 'disabled' : ''"
      @click="onSearch"
    >
      Cerca
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      /**
       * Raw List of suggestions items. it is populated on mounted by triggering loadFilterData
       * and then it's used as the starting full list by the computed method "suggestionsList"
       */
      filterData: [],
      /**
       * String representing the custom searched text that the user may write in the input box
       */
      filterText: "",
      /**
       * Integer representing the minimum number of digits to start the search
       */
      searchThreshold: 3,
    };
  },
  methods: {
    /**
     * Handle when the user writes a custom search text and starts
     * the search without selecting a service or a doctor.
     *
     * @fires onSearched when the user chooses a doctor
     */
    onSearch() {
      /**
       * Triggers when the user writes a custom search text and starts
       * the search without selecting a service or a doctor.
       * It works only if filterText is bigger or equal than searchThreshold
       *
       * @property {number} filterText text value searched by the user.
       */
      if (this.filterText.length >= this.searchThreshold) {
        this.$emit("onSearched", this.filterText);
      }
    },
    /**
     * Handle when the user clicks on an item inside the suggestions' list
     *
     * @fires doctorSelected when the user chooses a doctor
     * @fires serviceSelected when the user chooses a service
     */
    onSuggestionsClick(element) {
      // updates filterText variable value
      this.filterText = element.name;

      // check if user clicked on a doctor or a service
      if (element.type === "doctor") {
        /**
         * Triggers when the user chooses a doctor from the suggestions list.
         *
         * @property {Integer} element.id the id of the selected doctor.
         */
        this.$emit("doctorSelected", element.slug);
      } else {
        /**
         * Triggers when the user chooses a service from the suggestions list.
         *
         * @property {Integer} element.id the id of the selected service.
         */
        this.$emit("serviceSelected", element.slug);
      }
    },
    /**
     * Initialize filterData variable by getting data with axios from the server
     *
     */
    loadFilterData() {
      window.axios.get("/api/filter").then((resp) => {
        // TODO Add Error Handling
        this.filterData = resp.data;
      });
    },
  },
  computed: {
    /**
     * Represents the actual list of suggestions.
     * This list is automatically filtered when the value of filterText changes
     * (that happens every time the user changes the value of the text of the input field)
     */
    suggestionsList: function () {
      return this.filterData.filter((element) => {
        return element.name
          .toLowerCase()
          .includes(this.filterText.toLowerCase(), 0);
      });
    },
  },
  mounted() {
    // Loading filterData values on mounted
    this.loadFilterData();
  },
};
</script>

<style lang="scss" scoped>
.custom-filter {
  position: relative;
  .custom-filter-suggestions {
    display: none;
    max-height: 500px;
    overflow: scroll;
    .list-group-item {
      cursor: pointer;
      &:hover {
        background-color: rgb(191, 191, 191);
      }
    }
  }
  .custom-filter-input {
    &:focus + .custom-filter-suggestions {
      position: absolute;
      transform: translateY(40px);
      width: 100%;
      display: block;
      z-index: 2;
    }
  }
  .custom-filter-suggestions {
    display: none;
    &:active {
      position: absolute;
      transform: translateY(40px);
      width: 100%;
      display: block;
      z-index: 2;
    }
  }
}
</style>
