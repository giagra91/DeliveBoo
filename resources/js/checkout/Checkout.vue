<template>
    <div class="card-wrapper">

        <v-braintree
            :authorization="token"
            locale='it_IT'
            @success="onSuccess"
            @error="onError"
        >

        <template v-slot:button="slotProps">
            <button class="btn btn-warning mb-3" @click=" slotProps.submit" color="success">
                Salva i dati prima di pagare
            </button>
        </template>
        </v-braintree>
    </div>
</template>

<script>
export default {
    props: {
        token:{
            required: true,
            type : String,
        }
    },

    methods: {
        onSuccess (payload) {
            const nonce = payload.nonce;
            this.$emit('nonce', nonce)
        },
        log(item){
            console.log(item);
        },

        onError(error){
            const message = error.message;
        }
    }
}
</script>

<style lang="scss">

</style>
