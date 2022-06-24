<template>
	<div>
		<div class="d-flex justify-content-end position-relative p-5 mb-3">

			<div id="cart" class="w-25 position-absolute" v-if="checkCart">
					<div v-for="(item, index) in cart" :key="index" class="d-flex py-2">
							<p>{{item.name}} - € {{item.price}}</p>
							
					</div>
					<p v-if="totalPrice == 0"> Carrello vuoto</p>
					<p v-else class="text-danger">Totale € {{totalPrice}}</p>
			</div>
		</div>
	<div class="container">
		<div class="row m-4 gap-3 " id="singleRestaurant" >					
			<div class="col-3 rounded-3 p-4 my-food-card d-flex flex-column" v-for="(food, index) in restaurants[this.$route.params.id].food_items" :key="index">
				<div class="icons mb-2">
					<i @click.prevent="addToCart(food)" class="fa-solid fa-square-plus"></i>
					<i @click.prevent="removeFromCart(food)" class="ms-2 fa-solid fa-circle-minus"></i>
				</div>
				<h5>{{food.name}}<span class="text-danger ms-2"> &euro;{{food.price}}</span></h5>
				<p class="fst-italic">{{food.description}}</p>
			</div>
		</div>
	</div>
	</div>
</template>

<script>
export default {
	name: 'Menu',
	data: function (){
		return {
			// restaurantMenu : restaurants[this.$route.params.id].food_items,
			checkCart : false,
            cart : [],
            totaleQuantity : 0,
            totalPrice : 0,
		}
	},
	props: ["restaurants"],
	methods:{
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