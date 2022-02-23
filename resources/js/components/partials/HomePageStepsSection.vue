<template>
    <homepage-section-carousel
        title="Come funziona MediCall"
        subtitle="Il funzionamento"
        description="Prenotare una visita con MediCall è un gioco da ragazzi. Basta seguire 3 semplici steps."
    >
        <homepage-section-steps> </homepage-section-steps>
    </homepage-section-carousel>
</template>

<script>
import HomepageSectionCarousel from "../HomepageSectionCarousel.vue";
import HomepageSectionSteps from "../HomepageSectionSteps.vue";
export default {
    components: { HomepageSectionSteps, HomepageSectionCarousel },
};
</script>

<style></style>
