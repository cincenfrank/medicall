<script>
import VueCharts from 'vue-chartjs'
import { Bar, Line, mixins } from 'vue-chartjs'

export default {
    name: 'LineChart',
    components: { VueCharts, Bar, Line, mixins },
    extends: Bar,
    // mixins: [mixins.reactiveProp],
    data() {
        return {
            chartData: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'GitHub Commits',
                        backgroundColor: '#f87979',
                        data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
                    }
                ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Custom Chart Title'
                    }
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