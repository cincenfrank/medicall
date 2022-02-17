<template>
    <div>
        <div class="card w-50">
            <div class="card-header">Messaggi nel tempo</div>
            <div class="card-body">
                <bar-chart v-if="Object.keys(messagesData).length > 0" :chartData="messagesData"></bar-chart>
            </div>
        </div>

        <div class="card w-50">
            <div class="card-header">Recensioni nel tempo</div>
            <div class="card-body">
                <bar-chart v-if="Object.keys(reviewsData).length > 0" :chartData="reviewsData"></bar-chart>
            </div>
        </div>

        <div class="card w-50">
            <div class="card-header">Valutazioni</div>
            <div class="card-body">
                <bar-chart v-if="voteAvg !== 0" :chartData="voteAvg"></bar-chart>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'StatsPage',
    props: { rawChartsData: Object },
    data() {
        return {
            chartsData: [],
            messagesData: {},
            reviewsData: {},
            voteAvg: 0
        }
    },
    methods: {
        // active_subscription: []
        // messages_time: Array(4)
        // 0: {date: '09/02/2022', count: 2}
        // 1: {date: '11/02/2022', count: 5}
        // 2: {date: '12/02/2022', count: 3}
        // 3: {date: '15/02/2022', count: 6}
        // length: 4
        // [[Prototype]]: Array(0)
        // reviews_time: Array(5)
        // 0: {date: '08/02/2022', count: 3}
        // 1: {date: '10/02/2022', count: 3}
        // 2: {date: '11/02/2022', count: 2}
        // 3: {date: '12/02/2022', count: 3}
        // 4: {date: '15/02/2022', count: 69}
        // length: 5
        // [[Prototype]]: Array(0)
        // vote_avg: "2.9885"
        formatSingleObject(datasetsLabel, objectKey, dataVariable) {
            // se il parametro è voto allora ritorna il numero approssimato
            if (objectKey === 'vote_avg') {
                this[dataVariable] = Math.round(this.rawChartsData[objectKey])
                return
            }

            // se il parametro è (messages_time || reviews_time) allora crea la struttura dei dati
            const chartData = {
                labels: [], //date
                datasets: [ //valori
                    {
                        label: datasetsLabel,
                        backgroundColor: '#f87979',
                        data: []
                    }
                ]
            }

            this.rawChartsData[objectKey].forEach(el => {
                chartData.labels.push(el.date)
                chartData.datasets[0].data.push(el.count)
            })

            console.log(chartData)

            this[dataVariable] = chartData
        },
        prepareDataForChartJs() {
            this.formatSingleObject('messaggi', 'messages_time', 'messagesData')
            this.formatSingleObject('recensioni', 'reviews_time', 'reviewsData')
            this.formatSingleObject('vote', 'vote_avg', 'voteAvg')
        }
        // chartData: {
        //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        //     datasets: [
        //         {
        //             label: 'GitHub Commits',
        //             backgroundColor: '#f87979',
        //             data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
        //         }
        //     ]
        // },
    },
    mounted() {
        this.prepareDataForChartJs()
        console.log(this.rawChartsData)
    }
};
</script>

<style lang="scss" scoped></style>
