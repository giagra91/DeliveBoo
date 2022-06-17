<template>
    <section class="py-0 bg-primary-gradient">

        <div class="container">
          <div class="row justify-content-center g-0">
            <div class="col-xl-9">
              <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">Come funziona</h5>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-3 mb-6" v-for="(card, index) in navItems" :key="index">
                  <div class="text-center">
                    <img class="shadow-icon" :src="card.img" height="112" alt="card.title" />
                    <h5 class="mt-4 fw-bold">{{card.title}}</h5>
                    <p class="mb-md-0">{{card.paragraph}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
</template>

<script>
export default {
    name: 'Jumbotron',
    data: function(){
        return{
            navItems : [
                {
                    img: require("../../../public/img/logo-deliveboo/gallery/location.png"),
                    title : 'Dove siamo',
                    paragraph : 'Scegli il luogo in cui verrà consegnato il tuo cibo.'
                },
                {
                    img: require("../../../public/img/logo-deliveboo/gallery/order.png"),
                    title : 'Scegli l\'ordine',
                    paragraph : 'Controlla centinaia di menu per scegliere il tuo cibo preferito'
                },
                {
                    img: require("../../../public/img/logo-deliveboo/gallery/pay.png"),
                    title : 'Fai il pagamento',
                    paragraph : 'È veloce, sicuro e semplice. Seleziona diversi metodi di pagamento'
                },
                {
                    img: require("../../../public/img/logo-deliveboo/gallery/meals.png"),
                    title : 'Mangia felice',
                    paragraph : 'Il cibo viene consegnato direttamente a casa tua.'
                },
                ]
        }
    }
}
</script>

<style >

</style>
