<template>
    <div class="placeholder-glow mx-4 my-4 card-doctor-container">
        <div
            v-if="isLoading"
            class="placeholder col-12 w-100 placeholder-element"
        ></div>
        <div v-else class="card card-doctor">
            <img
                :src="serviceImagePath"
                class="card-img-top w-100"
                alt="doctor profile img"
            />
            <div class="card-body">
                <h5 class="card-title">{{ doctor.first_name }}</h5>
                <p class="card-text">{{ doctor.last_name }}</p>
                <a
                    :href="`/doctors/${doctor.slug}`"
                    class="btn btn-primary btn-custom-red"
                    >Visualizza profilo</a
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardDoctor",
    props: { doctor: Object },
    data() {
        return {
            isLoading: true,
            defaultImagePlaceholder: "/img/avatar_placeholder.jpeg",
        };
    },
    methods: {
        // getSponsoredDoctors() {
        //   window.axios.get("/api/doctors/sponsored").then((res) => {
        //     this.sponsoredDoctors = res.data;
        //     console.log(res.data);
        //   });
        // },
    },
    mounted() {
        let imgPromise = new Promise((resolve, reject) => {
            const img = new Image();
            img.src = this.serviceImagePath;
            img.onload = resolve;
            img.onerror = reject;
        });
        imgPromise
            .then(() => {
                console.log("Image loaded!");
                this.isLoading = false;
            })
            .catch((error) => {
                console.error("Some image(s) failed loading!");
                console.error(error.message);
            });
        //this.getSponsoredDoctors();
    },
    computed: {
        /**
         * Represents the image that will be displayed. Id imgPath is null it returns the default placeholder
         */
        serviceImagePath() {
            return this.doctor.user_detail.img_path
                ? "/storage/" + this.doctor.user_detail.img_path
                : this.defaultImagePlaceholder;
        },
    },
};
</script>

<style lang="scss" scoped>
.card-doctor-container {
    overflow: hidden;
    border-radius: 5px;

    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
    transition: all 0.2s linear;
    &:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
        transform: scale(1.01);
    }

    .placeholder-element {
        aspect-ratio: 9/16;
    }
    .card-doctor {
        .card-body {
            color: white;
            background-color: #12286a;
        }
    }
}
</style>
