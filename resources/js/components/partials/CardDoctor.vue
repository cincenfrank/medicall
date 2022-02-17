<template>
    <div class="card" style="width: 18rem;">
        <img src="https://picsum.photos/100" class="card-img-top" alt="doctor profile img">
        <div class="card-body" v-for="doctor in sponsoredDoctors" :key="doctor.id">
            {{ doctor.first_name + ' ' + doctor.last_name + ` [id: ${doctor.id}]` }}
        </div>
        <!-- <div class="card-body">
            <h5 class="card-title">{{ doctor.name }}</h5>
            <p class="card-text">{{ doctor.description }}</p>
            <a :href="`/doctors/${doctor.id}`" class="btn btn-primary">Visualizza profilo</a>
        </div> -->
    </div>
</template>

<script>
export default {
    name: 'CardDoctor',
    props: { doctor: Object },
    data() {
        return {
            sponsoredDoctors: []
        }
    },
    methods: {
        getSponsoredDoctors() {
            window.axios.get('/api/doctors/sponsored').then(res => {
                this.sponsoredDoctors = res.data
                console.log(res.data)
            })
        }
    },
    mounted() {
        this.getSponsoredDoctors()
    }
}
</script>

<style lang="scss" scoped>

</style>