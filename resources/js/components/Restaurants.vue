<template>
<div class="container">
	<div class="row m-4" id="allRestaurants">
    <div v-for="(restaurant, index) in restaurants" :key="index" class="col-sm-12 col-md-6 col-lg-4 mb-4" >

			<div class="card text-white card-has-bg click-col" v-bind:style="{ 'background-image': 'url(' + restaurant.logo + ')' }">
				<p>{{selectedItem}}</p>
				<img class="card-img d-none" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name">
				<div class="card-img-overlay d-flex flex-column">
						<div class="card-body">
								<small class="card-meta mb-2">p. iva: {{restaurant.vat_number}}</small>
								<a href="#" class="text-decoration-none">
										<h4 class="card-title mt-0 "><button class="text-white" @click="test(restaurant.id)">{{restaurant.name}}</button></h4>

								</a>
								<small><i class="far fa-clock"></i> {{restaurant.email}}</small>
						</div>
						<div class="card-footer">
								<div class="media">
										<img class="mr-3 rounded-circle" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name" style="max-width:50px">
										<div class="media-body">
												<h6 class="my-0 text-white d-block">{{restaurant.address}}</h6>
										</div>
								</div>
						</div>
				</div>
			</div>

			<div class="container">
            <div class="row m-4 gap-3 d-none" id="singleRestaurant" >
                    
                <h2 class="fw-bold text-uppercase">{{restaurantMenu.name}}</h2>
                    <div class="col-3 bg-primary rounded-3" v-for="(food, index) in restaurantMenu.food_items" :key="index">
                    <p>{{food.name}}</p>
                    <p>{{food.description}}</p>
                    <button class="btn btn-success" @click="addToCart(food)">Aggiungi</button>
                    <button class="btn btn-danger" @click="removeFromCart(food)">Rimuovi</button>
                </div>
                <button @click="checkDisplay()">change</button>
            </div>
        </div>

		</div>
	</div>
</div>
</template>

<script>
export default {
	name: 'Restaurants',
	props: {
		restaurants: Array,
	},
	data: function(){
        return{
            restaurantMenu : [],
            checkCart : false,
            cart : [],
            totaleQuantity : 0,
            totalPrice : 0,
            selectedItem: " ",
            cookingTypes : [],
            filteredRestaurants : [],
            selectedCategories : [],
        }
    },
	methods: {
			test(id){
			this.restaurantMenu = [];
			axios.get(`http://127.0.0.1:8000/api/users/`)
					.then((result) => {
							this.restaurantMenu = result.data[id - 1];
					})
					.catch((error) => {
							console.warn(error);
					})
					this.checkDisplay();
	},
	checkDisplay(){
			let wrapper = document.getElementById("my-wrapper");
			let singleRestaurant = document.getElementById("singleRestaurant");
			wrapper.classList.toggle("d-none");
			singleRestaurant.classList.toggle("d-none");
			this.checkCart = !this.checkCart;
	},
	}

}
</script>

<style>

</style>