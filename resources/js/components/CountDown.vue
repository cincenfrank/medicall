<template>
<div v-if="dataLoaded">
    <div class="timer">
        {{ millisToHoursAndMinutesAndSeconds(countdown) }}
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            countdown: 0,
            dataLoaded : false,
        };
    },
    props: {
        expirationDate: String,
    },
    mounted() {
        this.setupCountdownTimer();
    },
    methods: {
        setupCountdownTimer() {
            let dayjs = require("dayjs");
            let timer = setInterval(() => {
                this.countdown =
                    dayjs(this.expirationDate).add(1,"hours").valueOf() - dayjs().valueOf();
                this.dataLoaded = true;
                if (this.countdown <= 0) {
                    this.countdown = 0;
                    clearInterval(timer);
                }
            }, 1000);
        },
        millisToHoursAndMinutesAndSeconds(millis) {
            const hours = Math.floor(millis / (1000 * 60 * 60));
            const minutes = Math.floor(millis / (1000 * 60) - (hours * 60) );
            const seconds = ((millis % 60000) / 1000).toFixed(0);

            return hours + ":" + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
        },
    },
};
</script>

<style></style>
