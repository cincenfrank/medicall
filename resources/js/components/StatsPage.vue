<template>
    <div class="row justify-content-center pt-2 px-5">
        <div class="col-12 col-md-4 mb-3 mb-md-0">
            <div class="card h-100 mb-3 mb-md-0 custom-shadow">
                <div class="card-header text-center fw-bold">
                    Media valutazioni
                </div>
                <div
                    class="card-body d-flex justify-content-center align-items-center"
                >
                    <stars v-if="voteAvg !== 0" :ratings="voteAvg"></stars>
                    <!-- {{ voteAvg }}/5 -->
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card h-100 mb-3 mb-md-0 custom-shadow">
                <div class="card-header text-center fw-bold">N° messaggi</div>
                <div
                    class="card-body d-flex justify-content-center align-items-center display-5"
                >
                    {{ getTotalMessages }}
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card h-100 mb-3 mb-md-0 custom-shadow">
                <div class="card-header text-center fw-bold">N° reviews</div>
                <div
                    class="card-body d-flex justify-content-center align-items-center display-5"
                >
                    {{ getTotalReviews }}
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mt-3 mt-md-3">
            <div class="card mb-3 mb-md-0 custom-shadow">
                <div class="card-header">Messaggi nel tempo</div>
                <div class="card-body">
                    <bar-chart
                        v-if="Object.keys(messagesData).length > 0"
                        :chartData="messagesData"
                    ></bar-chart>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mt-3 mt-md-3">
            <div class="card mb-3 mb-md-0 custom-shadow">
                <div class="card-header">Recensioni nel tempo</div>
                <div class="card-body">
                    <bar-chart
                        v-if="Object.keys(reviewsData).length > 0"
                        :chartData="reviewsData"
                    ></bar-chart>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Stars from "./partials/Stars.vue";

export default {
    components: { Stars },
    name: "StatsPage",
    props: { rawChartsData: Object },
    data() {
        return {
            chartsData: [],
            messagesData: {},
            reviewsData: {},
            voteAvg: 0,
        };
    },
    methods: {
        formatSingleObject(datasetsLabel, objectKey, dataVariable) {
            // se il parametro è voto allora ritorna il numero approssimato
            if (objectKey === "vote_avg") {
                this[dataVariable] = Math.round(this.rawChartsData[objectKey]);
                return;
            }

            // se il parametro è (messages_time || reviews_time) allora crea la struttura dei dati
            const chartData = {
                labels: [], //date
                datasets: [
                    //valori
                    {
                        label: datasetsLabel,
                        backgroundColor:
                            datasetsLabel === "messaggi"
                                ? "#12286a"
                                : "#bb0f13",
                        data: [],
                    },
                ],
            };

            this.rawChartsData[objectKey].forEach((el) => {
                chartData.labels.push(el.date);
                chartData.datasets[0].data.push(el.count);
            });

            this[dataVariable] = chartData;
        },
        prepareDataForChartJs() {
            this.formatSingleObject(
                "messaggi",
                "messages_time",
                "messagesData"
            );
            this.formatSingleObject(
                "recensioni",
                "reviews_time",
                "reviewsData"
            );
            this.formatSingleObject("vote", "vote_avg", "voteAvg");
        },
    },
    computed: {
        getTotalMessages() {
            return this.rawChartsData.messages_time.reduce((acc, cur) => {
                return acc + cur.count;
            }, 0);
        },
        getTotalReviews() {
            return this.rawChartsData.reviews_time.reduce((acc, cur) => {
                return acc + cur.count;
            }, 0);
        },
    },
    mounted() {
        this.prepareDataForChartJs();
        console.log(this.rawChartsData);
    },
};
</script>

<style lang="scss" scoped>
.card-header {
    background-color: #12286a;
    color: white;
    text-align: center;
}
</style>
