<template>
	<div>
        <div class="container">
            <div class="row m-4 ">
                <div class="col-12 col-lg-7 rounded-3 p-4 my-food-card d-flex flex-column" v-for="(food, index) in restaurants[this.$route.params.id].food_items" :key="index">
                    <div class="icons mb-2">
                        <i @click.prevent="addToCart(food)" class="fa-solid fa-square-plus"></i>
                        <i @click.prevent="removeFromCart(food)" class="ms-2 fa-solid fa-circle-minus"></i>
				</div>
                    <h5>{{food.name}}<span class="text-danger ms-2"> &euro;{{food.price}}</span></h5>
                    <p class="fst-italic">{{food.description}}</p>
                </div>
                <div class="col-sm-3 col-6 mx-auto d-flex justify-content-center align-items-center">
<!-- 					<router-link :to="{name: 'payment' }"> -->
						<button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
							<i class="fa-solid fa-cart-shopping"></i>
							<span class="badge bg-gradient-danger" id="cart-badge">
								{{ cartBadge }}
							</span>
						</button>
<!-- 					</router-link>
 -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="cart" class="w-100 border border-warning rounded p-2" >

                                        <div v-for="(item, index) in cart" :key="index" class="d-flex py-2">
                                            <p>{{item.name}} - € {{item.price}}   <i @click.prevent="removeFromCart(item)" class="ms-2 fa-solid fa-circle-minus"></i></p>
                                        </div>
                                        <p v-if="totalPrice == 0"> Carrello vuoto</p>
                                        <p v-else class="text-danger">Totale € {{totalPrice}}</p>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	<!-- <div class="container">
		<div class="row m-4 gap-3 " id="singleRestaurant" >
			<div class="col-3 rounded-3 p-4 my-food-card d-flex flex-column" >

			</div>
		</div>
	</div> -->
	</div>
</template>

<script>
export default {
	name: 'Menu',
	data: function (){
		return {
			// restaurantMenu : restaurants[this.$route.params.id].food_items,
			checkCart : false,
            cartBadge: document.getElementById('cart-badge'),
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
            this.cartBadge = this.cart.length ;


		},
		removeFromCart(food){

			this.cart.forEach((item, index) => {

			if(food.name == item.name){
					this.cart.splice(index, 1);
					this.totalPrice -= food.price;
					window.localStorage.removeItem("cart", JSON.stringify(food[index]));
					window.localStorage.setItem("totalPrice", JSON.stringify(this.totalPrice ));
					console.log(this.cart)
                    this.cartBadge = this.cart.length ;
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
                this.cartBadge = this.cart.length;
			} catch (e) {
                this.totalPrice = 0;
                this.cart = [];
                this.cartBadge = 0;
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
