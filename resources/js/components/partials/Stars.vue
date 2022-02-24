<template>
    <div>
        <slot></slot>
        <ul class="d-flex list-unstyled mb-0">
            <li class="rounded">
                <i
                    v-for="i in 5"
                    :key="i"
                    class="text-warning single-star"
                    :class="ratings >= i ? 'fas fa-star' : 'far fa-star'"
                    aria-hidden="true"
                ></i>
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

<style lang="scss" scoped>
.single-star {
    color: #ffd64a;
    font-size: 18px;
    padding: 0 2px;
}
</style>
