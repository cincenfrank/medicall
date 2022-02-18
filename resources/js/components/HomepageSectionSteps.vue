<template>
    <section class="container">
        <!-- 1° section -->
        <div class="card">
            <div class="circle">
                <div class="content">
                    <h2>Prenota</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Itaque, assumenda debitis? Porro omnis temporibus
                        quia ipsa pariatur amet similique tempora ratione
                        architecto! Velit provident debitis numquam quidem sunt
                        ipsam aperiam.
                    </p>
                </div>

                <img src="https://picsum.photos/500/400" alt="" />
            </div>
        </div>
        <!-- <div class="row p-5 d-flex align-items-center">
            <div class="col-md-6">
                <div class="section-img text-center w-sm-50">
                    <img src="https://picsum.photos/500/400" alt="section-home-img">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-text">
                    <div class="mb-20 text-center">
                        <span class="mb-5">STEP 1</span>
                        <h1 class="display-4 mb-10">
                            <span class="text-primary">Scegli</span> il <br> 
                            medico
                        </h1>
                        <p>Tramite il nostro sito potrai visualizzare e prenotare i migliori specialisti per ogni settore medico</p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- 2° section -->
        <div class="row p-5 d-flex align-items-center">
            <div class="col-md-6">
                <div class="section-text">
                    <div class="mb-20 text-center">
                        <span class="mb-5">STEP 2</span>
                        <h1 class="display-4 mb-10">
                            <span class="text-primary">Prenota</span> la <br />
                            visita
                        </h1>
                        <p>
                            Tramite il nostro sito potrai visualizzare e
                            prenotare i migliori specialisti per ogni settore
                            medico
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-img text-center">
                    <img
                        src="https://picsum.photos/500/400"
                        alt="section-home-img"
                    />
                </div>
            </div>
        </div>

        <!-- 3° section -->
        <div class="row p-5 d-flex align-items-center">
            <div class="col-md-6">
                <div class="section-img text-center">
                    <img
                        src="https://picsum.photos/500/400"
                        alt="section-home-img"
                    />
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-text">
                    <div class="mb-20 text-center">
                        <span class="mb-5">STEP 3</span>
                        <h1 class="display-4 mb-10">
                            <span class="text-primary">Vai</span> alla <br />
                            visita
                        </h1>
                        <p>
                            Tramite il nostro sito potrai visualizzare e
                            prenotare i migliori specialisti per ogni settore
                            medico
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "HomepageSectionSteps",
};
</script>

<style lang="scss" scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.card {
    position: relative;
    width: 600px;
    height: 350px;
    background-color: #12286a;
    border-radius: 20px;
    display: flex;
    align-items: center;
    transition: 0.5s;
}

.circle {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 20px;
    /* overflow: hidden; */
}

.circle::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: rgb(184, 2, 2); */
    clip-path: circle(120px at center);
    transition: 0.5s;
}
.circle:hover::before {
    background-color: #bb0f13;
    clip-path: circle(400px at center);
    border-radius: 20px;
}
.card img {
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 20px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    object-fit: cover;
    object-position: right;
    pointer-events: none;
    transition: 0.5s;
}
.circle:hover img {
    left: 80%;
    height: 420px;
    width: 70%;
}

.card .content {
    display: flex;
    height: 100%;
    justify-content: center;
    flex-direction: column;
    position: relative;
    width: 40%;
    padding: 10px 10px 10px 20px;
    transition: 0.5s;
    color: white;
}

.card .content h2 {
    visibility: visible;
    position: relative;
    top: 25%;
    transition: 0.3s;
    font-size: 2rem;
}
.card .content p {
    opacity: 0;
    visibility: hidden;
    font-size: 16px;
    font-weight: bolder;
    transition: 0.5s;
}

.card:hover .content h2 {
    font-size: 3rem;
    top: 0;
    text-transform: uppercase;
}
.card:hover .content p {
    opacity: 1;
    visibility: visible;
}

img {
    border-radius: 15px;
}
</style>
