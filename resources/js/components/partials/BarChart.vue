<script>
import VueCharts from 'vue-chartjs'
import { Bar, Line, mixins } from 'vue-chartjs'

export default {
    name: 'BarChart',
    components: { VueCharts, Bar, Line, mixins },
    extends: Bar,
    props: {
        chartData: Object
    },
    // mixins: [mixins.reactiveProp],
    data() {
        return {
            // oldChartData: {
            //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            //     datasets: [
            //         {
            //             label: 'GitHub Commits',
            //             backgroundColor: '#f87979',
            //             data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
            //         }
            //     ]
            // },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Custom Chart Title'
                    }
                },
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                            // OR //
                            // beginAtZero: true   // minimum value will be 0.
                        }
                    }]
                }
            }
        }
    },
    mounted() {
        this.renderChart(this.chartData, this.options)
    }
}
</script>

<style lang="scss" scoped>

</style>