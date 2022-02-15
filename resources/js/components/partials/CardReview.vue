<template>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ review.title }}</h5>
                <h5 class="card-title">From: {{ review.reviewer_name }}</h5>
                <!-- Component Stars -->
                <stars :ratings="review.rating"></stars>

                <p class="card-text">{{ truncate(review.content, 100) }}</p>
                <!-- <p class="card-text">
                    Recensito il {{ $review->created_at->format('d F y') }}
                </p> -->
            </div>
        </div>
    </div>
</template>

<script>
import Stars from "./Stars.vue";
export default {
    components: { Stars },
    name: "card-review",
    props: {
        review: Object,
        // rating: Number,
    },
};
</script>

<style lang="scss" scoped></style>
