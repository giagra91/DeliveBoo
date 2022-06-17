<template>
    <div>
        <div class="card" v-for="(restaurant, index) in restaurants" :key="index">
            <img class="card-img-top w-25" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name">
            <div class="card-body">
                <h5 class="card-title">{{restaurant.name}}</h5>
                <p class="card-text">{{restaurant.address}}</p>
                <p class="card-text">{{restaurant.vat_number}}</p>
                <p class="card-text">{{restaurant.email}}</p>

                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
    data: function(){
        return{
            restaurants: [],
        }
    },
    methods:{
        getRestaurants(){
            axios.get("http://127.0.0.1:8000/api/users")
            .then((result) => {
                console.log(result.data);
                this.restaurants = result.data;
            })
            .catch((error) => {
                console.warn(error);
            })
        }
    },
    created(){
        this.getRestaurants();
    }
}
</script>

<style lang="scss" >

</style>