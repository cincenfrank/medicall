<template>
    <div class="h-100 px-4 py-4">
        <div class="card-review-container h-100">
            <div class="card card-review h-100">
                <div class="card-header text-center">
                    <div class="doctor-emoji rounded-pill">🩺</div>
                    <a
                        class="card-text card-doctor-link mb-0"
                        :href="`/doctors/${review.user_id}`"
                    >
                        {{ review.user.last_name }}
                        {{ review.user.first_name }}
                    </a>
                </div>
                <div class="card-body" @click="flipCard">
                    <div
                        class="card-front d-flex flex-column align-items-center justify-content-between"
                        v-if="isFront"
                    >
                        <stars :ratings="review.rating"></stars>
                        <div class="text-center">
                            <h5 class="card-text mb-0 fw-bold text-center">
                                {{ review.title }}
                            </h5>
                            <a class="text-underline">Vedi recensione</a>
                            <div
                                class="card-text d-none d-sm-block d-lg-none d-xl-block"
                            >
                                Recensito il {{ getParsedDate() }}
                            </div>
                        </div>

                        <!-- <p class="card-text text-truncate">"{{ review.content }}"</p> -->
                        <p
                            class="card-text fst-italic text-end align-self-end mt-3 d-none d-sm-block d-lg-none d-xl-block"
                        >
                            {{ review.reviewer_name }}
                        </p>
                    </div>
                    <div
                        class="card-back d-flex flex-column align-items-center justify-content-between"
                        v-else
                    >
                        <div>{{ review.content }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Stars from "./Stars.vue";
import dayjs from "dayjs";

export default {
    components: { Stars },
    data() {
        return { isFront: true };
    },
    props: {
        review: Object,
    },
    methods: {
        flipCard() {
            this.isFront = !this.isFront;
        },
        getParsedDate() {
            return dayjs(this.review.created_at).format("DD/MM/YYYY");
        },
    },
};
</script>

<style lang="scss" scoped>
.card-review-container {
    overflow: hidden;
    border-radius: 5px;
    width: 100%;
    aspect-ratio: 268/208;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
    transition: all 0.2s linear;
    &:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
        transform: scale(1.01);
    }

    .card-review {
        // border: 2px solid #12286a;
        // transition: all 0.5s linear;
        // &:hover {
        //   border: 2px solid #bb0f13;
        // }
        .card-body {
            position: relative;
            p.card-text {
                right: 5%;
                bottom: 5%;
                position: absolute;
            }
            overflow: hidden;
            a {
                cursor: pointer;
                transition: all 0.3s linear;
                font-weight: bold;
                &:hover {
                    color: #bb0f13;
                }
            }
            .card-back {
                height: 100%;
                overflow-y: scroll;
            }
        }
        .card-header {
            background-color: #12286a;
            border-color: #12286a;
            color: white;
            font-weight: bold;
            .doctor-emoji {
                background-color: white;
                display: inline-block;
                width: 23px;
                position: absolute;
                left: 10px;
            }
            .card-doctor-link {
                text-decoration: none;
                // font-size: 50;
                color: white;
            }
        }
    }
}
</style>
