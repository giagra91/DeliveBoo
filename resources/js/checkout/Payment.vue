<template>
    <div class="form-wrapper p-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <div  id="errors">

                        </div>

                        <div id="loading">
                                <form class="mx-auto">
                                    <div class="form-group">
                                        <label class="name" for="Nome">Nome</label>
                                        <input type="text" class="form-control my-form" placeholder="Inserisci il tuo nome" name="name">
                                    </div>


                                    <div class="form-group">
                                        <label for="Cognome">Cognome</label>
                                        <input type="text" class="form-control" placeholder="Inserisci il tuo Cognome">
                                    </div>

                                    <div class="form-group">
                                        <label for="Indirizzo">Indirizzo</label>
                                        <input type="text" class="form-control" placeholder="Inserisci il tuo Indirizzo">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserisci la tua email">
                                        <small id="emailHelp" class="form-text text-muted">Non condivideremo mai le tue informazioni con nessuno</small>
                                    </div>

                                    <button class="btn btn-success" v-if="!disableBuyButton" @click.prevent="pay"> Procedi con l'acquisto</button>

                                    <button v-else class="btn btn-warninng mb-4"> {{loadingPayment ? 'Loading...' : 'Procedi con l\'acquisto'}}</button>
                                </form>

                                <div class="text-center">
                                    <button class="btn btn-warning" @click="getToken()">Aggiungi un metodo di pagamento</button>

                                    <br>

                                    <br>

                                    <Checkout  v-if="token !== '' " :token='token' @nonce='setNonce' />

                                    <div class="">
                                        <button id="valdiateBtn" class="btn btn-success" @click="getPayment">Paga</button>

                                        <router-link :to="{name: 'menu' }">
                                            <button class="btn btn-dark">Ritorna ai menù</button>
                                        </router-link>
                                    </div>

                                </div>

                        </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import Checkout from './Checkout.vue'
import axios from 'axios';
export default {
    name: 'id',

    components: {
        Checkout
    },

    data: function (){
        return {
            product: [],
            token: '',
            disableBuyButton: true,
            loadingPayment: true,
            form: {nonce: '',
                amount: 0
            }
        }
    },

    methods: {
            getPost() {
                axios.get(`http://localhost:8000/api/products/${id}`)
                .then((result)=>{
                    this.product = result.data;
                    console.log(this.product)
                })
                .catch((error) => {
                    console.warn(error);
                });
            },

            getToken() {
                axios.get('/api/orders/token')
                .then((result)=> {
                this.token = result.data.token;
                console.log(result);
                })
                .catch((error)=>{
                    console.warn(error);
                })
            },

            setNonce(nonce){
                this.form.nonce=nonce
            },

            getPayment(){
                axios.post('/api/orders/payment', this.form)
                .then((result)=> {
                    console.log(result);
                    if (result.data.success){
                        this.$router.push('/thanks')
                    } else {
                        alert('Pagamento rifiutato')
                    }
                })
            },


            checkForm(){
                const form = {
                    name: "",
                };

                let keys = Object.keys(form);

                let errors = {};
                let error_messages = document.getElementById('errors');
                error_messages.innerHTML = "";
                if(form.name == '') errors.name = "Il nome non è valido";
                if (Object.keys(errors).length !== 0){
                    for(const error in errors){
                        error_messages.classList.add("alert", "alert-danger");
                        error_messages.innerHTML += errors[error] + "<br>";
                    }
                }
            },

            sendDatas(){
                let validateBtn = document.getElementById('validateBtn');
                validateBtn.addEventListener("click", function(){
                    checkForm();
                })
            },

            // async buy () {
            //     try {
            //         let response = await axios.post('/api/orders/payment', {...this.form});
            //         console.log(response)
            //     }catch(error){
            //         console.log(error)
            //     }
            // },

        created(){
            this.getPost(this.$route.params.id);
            this.getPayment();
        },

/*         async mounted(){
            let response = await axios.get('http://localhost:8000/api/orders/generate')
            this.tokenApi = response;
            console.log(response)
        } */
    },

}
</script>

<style lang="scss">
/*     .form-wrapper{
        background-image: url('https://img.freepik.com/free-photo/top-view-burger-fries-with-sauces-copy-space_23-2148784450.jpg?w=2000');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        width: 100%;
    } */

    .form-control{
        border-bottom: 1px solid orange;
    }

    .form-group {
        padding: 0 2rem;
    }

    .btn {
        margin: 0 auto;
    }

    .form-control{
        margin-bottom: 2rem;
    }
</style>
