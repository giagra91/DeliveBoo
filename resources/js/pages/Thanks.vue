<template>
    <div class="wrapper">
        <div class="container">
            <div class="row ">                
                <div class="col-6 mx-auto button-wrapper text-center py-3">
                    <router-link :to="{name: 'Home' }">
                        <button class="btn btn-dark">Torna alla homepage</button>
                    </router-link>
                </div>

                <div class="col col-12 ">
                    <img src="../assets/thanks.jpg" class="sfondo" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {

    }
}
</script>

<style lang="scss">
    .wrapper, .button-wrapper {
        background-color: #7e2e2d;
    }

    .sfondo {
        width: 100%;
        height: 97vh;
    }


</style>