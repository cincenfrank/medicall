<template>
    <div class="container">
        <div class="d-flex">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- Card Review -->
                <card-review
                    v-for="review in reviews"
                    :key="review.id"
                    :review="review"
                ></card-review>
                <!-- <h1 v-for="review in reviews" :key="review.id">{{ review.title }}</h1> -->
            </div>
        </div>
    </div>
</template>

<script>
import CardReview from "./CardReview.vue";
export default {
    components: { CardReview },
    name: "ReviewsSection",
    data() {
        return {
            reviews: [],
        };
    },
    methods: {
        getReviews() {
            const url = window.location.href;
            const idDoctor = url.split("/").slice(-1)[0];
            // console.log(lastParam);
            window.axios.get("/api/doctor/" + idDoctor).then((resp) => {
                this.reviews = resp.data;
                // console.log(resp.data);
            });
        },
    },
    mounted() {
        this.getReviews();
    },
};
</script>

<style lang="scss" scoped></style>
