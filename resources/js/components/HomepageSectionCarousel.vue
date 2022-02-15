<template>
    <section class="container">
        <div class="d-flex flex-column align-items-center justify-content-center p-5">
            <div class="top text-center">
                <span class="text-primary text-uppercase mb-5">{{ subtitle }}</span>
                <h2 class="mb-10 display-6 fw-bold">{{ title }}</h2>
                <p class="mb-10">{{ description }}</p>
            </div>
            <slot>
                <!-- here goes the bottom content like the carousel with the cards -->
            </slot>
        </div>
    </section>
</template>

<script>
export default {
    name: 'HomepageSectionCarousel',
    props: {
        title: String,
        subtitle: String,
        description: String
        // text: Object
    }
}
</script>

<style lang="scss" scoped>

</style>