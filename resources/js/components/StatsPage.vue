<template>
    <div>
        <div class="card w-50">
            <div class="card-header">Messaggi nel tempo</div>
            <div class="card-body">
                <bar-chart :chartData="chartsData[0]"></bar-chart>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'StatsPage',
    props: { rawChartsData: Array },
    data() {
        return {
            chartsData: []
        }
    },
    methods: {
        prepareDataForChartJs(datasets_label) {
            const labels = [] //date
            const datasets = [ //valori
                {
                    label: datasets_label,
                    backgroundColor: '#f87979',
                    data: []
                }
            ]

            this.rawChartsData.forEach(el => {
                labels.push(el.date)
                datasets
            })
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
    }
};
</script>

<style lang="scss" scoped></style>
