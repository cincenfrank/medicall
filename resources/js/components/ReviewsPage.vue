<template>
    <div>
        <ul class="d-flex list-unstyled">
            <li v-for="number in ratings" :key="number">
                <i class="fa fa-star" aria-hidden="true"></i>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            prova: "titolo di prova",
        };
    },
    props: {
        ratings: Number,
    },
    methods: {},
};
</script>

<style lang="scss" scoped></style>
