<template>
	<div>
	<div class="container">
		<!-- carrello -->
		<!-- <div class="d-flex justify-content-end position-relative p-5 mb-3">

				<div id="cart" class="w-25 position-absolute" v-if="checkCart">
						<div v-for="(item, index) in cart" :key="index" class="d-flex py-2">
								<p>{{item.name}} - € {{item.price}}</p>
								
						</div>
						<p v-if="totalPrice == 0"> Carrello vuoto</p>
						<p v-else class="text-danger">Totale € {{totalPrice}}</p>
				</div>
		</div> -->

		<div class="row m-4" id="allRestaurants" >
			<div v-for="(restaurant, index) in restaurants" :key="index" class="col-sm-12 col-md-6 col-lg-4 mb-4" >
				<div class="card text-white card-has-bg click-col" v-bind:style="{ 'background-image': 'url(' + restaurant.logo + ')' }">
					<img class="card-img d-none" :src="(restaurant.logo) ? restaurant.logo : 'img/loghi/generic-restaurant.jpg'" :alt="restaurant.name">
					<div class="card-img-overlay d-flex flex-column">
							<div class="card-body">
								
									<h6 class="text-white fw-bold menu-icon">
										<router-link :restaurantMenu="restaurantMenu" @click.prevent="test(restaurant.id)" :to="{ name: 'menu', params : { id : index} }">Menu<i class="fa-solid fa-utensils" ></i></router-link>
									</h6>
										<h4 class="card-title mt-0 ">
											{{restaurant.name}} {{index}}
										</h4>
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
			</div>
		</div>
	</div>
	
	<!-- <div class="container">
		<div class="row m-4 gap-3 " id="singleRestaurant" >					
			<div class="col-3 rounded-3 p-4 my-food-card d-flex flex-column" v-for="(food, index) in restaurantMenu" :key="index">
				<div class="icons mb-2">
					<i @click.prevent="addToCart(food)" class="fa-solid fa-square-plus"></i>
					<i @click.prevent="removeFromCart(food)" class="ms-2 fa-solid fa-circle-minus"></i>
				</div>
				<h5>{{food.name}}<span class="text-danger ms-2"> &euro;{{food.price}}</span></h5>
				<p class="fst-italic">{{food.description}}</p>
			</div>
		</div>
	</div> -->

	

</div>
</template>


<script>
export default {
		name: 'RestaurantsPage',
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
						isMenuClicked: false,
        }
    },
	methods: {
		test(id){
			this.restaurantMenu = [];
			axios.get(`http://127.0.0.1:8000/api/users/${id}`)
				.then((result) => {
						this.restaurantMenu = result.data.results;
						console.log(this.restaurantMenu);
				})
				.catch((error) => {
						console.warn(error);
				})
				this.isMenuClicked = true;
				this.$emit('hasClickedMenu', this.isMenuClicked);
		},

		addToCart(food){
			this.checkCart = true;

			let productInCart = { 
				name : food.name, 
				price : food.price,
				};

			// this.cart.forEach(item => {
			// 	if (item.name === productInCart.name ) {
			// 		console.log(item.price)
			// 		item.price += item.price;
			// 		item.quantity++;
			// 		console.log(item.price)
			// 		console.log(item.quantity)
			// 	} else {
			// 		this.cart.push(productInCart);
			// 	}
			// });

			this.cart.push(productInCart);

			this.totalPrice += food.price;

			window.localStorage.setItem("cart", JSON.stringify(this.cart ));

			window.localStorage.setItem("totalPrice", JSON.stringify(this.totalPrice ));
			// console.log(JSON.parse(localStorage.getItem('cart')));
			console.warn(window.localStorage.getItem("cart"),window.localStorage.getItem("totalPrice"));
		},
		removeFromCart(food){

			this.cart.forEach((item, index) => {

					if(food.name == item.name){
							this.cart.splice(index, 1);
							this.totalPrice -= food.price;
							window.localStorage.removeItem("cart", JSON.stringify(food[index]));
							window.localStorage.setItem("totalPrice", JSON.stringify(this.totalPrice ));
							console.log(this.cart)
					} else {
							console.log("non esiste");
					}
			});
		},
	},
	mounted: function mounted() {
    try {
      this.totalPrice = JSON.parse(localStorage.totalPrice);
      this.cart = JSON.parse(localStorage.cart);
    } catch (e) {
      this.totalPrice = 0;
      this.cart = [];
    }
	}
}

</script>

<style lang="scss" scoped>
	i {
		font-size: 1.3rem;
		cursor: pointer;
		color: #FFB30E;
	}

	h6.menu-icon {
		&:hover {
			text-decoration: underline;
		}
	}
</style>