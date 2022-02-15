<template>
    <div>
        <slot></slot>
        <ul class="d-flex list-unstyled">
            <li class="bg-secondary rounded p-1">
                <i
                    v-for="i in 5"
                    :key="i"
                    :class="ratings >= i ? 'fas fa-star' : 'far fa-star'"
                    aria-hidden="true"
                    style="color: yellow"
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

<style lang="scss" scoped></style>
