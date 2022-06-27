<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-3" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
                <a class="navbar-brand d-inline-flex" href="http://127.0.0.1:8000/guest">
                    <img class="d-inline-block ms-2" src="../../../public/img/logo-deliveboo/logo.svg" alt="logo" />
                    <span class="text-1000 fs-3 fw-bold ms-2 text-gradient">DeliveBoo</span>
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button> -->
                <!-- <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">



                </div> -->
                <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon mt-2">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </span>
                </button>
                <div class="navbar-collapse w-100 pt-3 pb-2 py-lg-0 collapse" id="navbarSupportedContent">
                    <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
                        <p class="mb-0 fw-bold text-lg-center ">Sede legale: <span class="text-gradient">Via Firenze 4, Roma</span></p>
                    </div>
                    <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0">
                        <a class="btn btn-outline-warning" type="submit" href="http://127.0.0.1:8000/register">Area Ristoratore</a>
                    </form>
                </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style >

</style>
