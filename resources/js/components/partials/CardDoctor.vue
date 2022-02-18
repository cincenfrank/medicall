<template>
  <div class="card">
    <img
      src="https://picsum.photos/100"
      class="card-img-top"
      alt="doctor profile img"
    />
    <!-- <div class="card-body" v-for="doctor in sponsoredDoctors" :key="doctor.id">
            {{ doctor.first_name + ' ' + doctor.last_name + ` [id: ${doctor.id}]` }}
        </div> -->
    <div class="card-body">
      <h5 class="card-title">{{ doctor.first_name }}</h5>
      <p class="card-text">{{ doctor.last_name }}</p>
      <a :href="`/doctors/${doctor.id}`" class="btn btn-primary"
        >Visualizza profilo</a
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "CardDoctor",
  props: { doctor: Object },
  data() {
    return {};
  },
  methods: {
    // getSponsoredDoctors() {
    //   window.axios.get("/api/doctors/sponsored").then((res) => {
    //     this.sponsoredDoctors = res.data;
    //     console.log(res.data);
    //   });
    // },
  },
  mounted() {
    //this.getSponsoredDoctors();
  },
};
</script>

<style lang="scss" scoped>
</style>