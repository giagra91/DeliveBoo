<template>
	<div>
        <div class="container">
            <div class="row m-4 ">
                <div class="col-12 col-lg-7 rounded-3 p-4 my-food-card d-flex " v-for="(food, index) in restaurants[this.$route.params.id].food_items" :key="index">
                    <div class="icons mb-2">
                        <i @click.prevent="addToCart(food)" class="fa-solid fa-square-plus"></i>

				    </div>
                    <div>
                        <h5>{{food.name}}<span class="text-danger ms-2"> &euro;{{food.price}}</span></h5>
                        <p class="fst-italic">{{food.description}}</p>
                    </div>
                </div>
                <div class="col-5 mx-auto d-flex justify-content-center align-items-center flex-column">

						<button type="button" class="btn bg-gradient-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
							<i class="fa-solid fa-cart-shopping"></i>
							<span class="badge bg-gradient-danger" id="cart-badge">
								{{ cartBadge }}
							</span>
						</button>

                    <router-link :to="{name: 'payment' }" >
                            <button class="btn bg-gradient-success d-flex align-items-center">
                                <i class="fa-solid fa-credit-card me-2" ></i>
                                Paga
                            </button>
                    </router-link>

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
                                    <div id="cart" class="w-100 border border-warning rounded p-2 shadow" >
                                        <div v-for="(item, index) in cart" :key="index" class="d-flex py-2 flex-column">
                                            <p><i @click.prevent="removeFromCart(item)" class="ms-2 fa-solid fa-circle-minus text-danger"></i> {{item.name}}</p>
                                            <p><i class="fa-solid fa-euro-sign text-success"></i> {{item.price}}</p>
                                        </div>
                                        <p v-if="totalPrice == 0" class="text-dark fw-bold text-center"> Carrello vuoto</p>
                                        <p v-else class="text-info fw-bold">Totale:  <i class="fa-solid fa-euro-sign "></i> {{totalPrice}}</p>
                                        <div v-if="totalPrice >= 200">
                                            <img class="img-fluid" src="../../../public/img/rocco.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-6  d-flex justify-content-center align-items-center">

                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>
import Swal from 'sweetalert2';

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
			this.cart.push(productInCart);
            Swal.fire({
                        title :'Piatto aggiunto al carrello!',
                        // text: 'Il piatto è stato cancellato.',
                        icon :'success',
                        timer: 1500,
                        showConfirmButton: false
                    })
			this.totalPrice += food.price;
			window.localStorage.setItem("cart", JSON.stringify(this.cart ));

			window.localStorage.setItem("totalPrice", JSON.stringify(this.totalPrice ));
            this.cartBadge = this.cart.length ;


		},
		removeFromCart(food){
            console.log(food);
				let index = this.cart.indexOf(food)
            console.log(index);
            //l'errore è che quando rimuovo fuori dal carrello index = -1
			if (this.cart.includes(food)){
				this.cart.splice(index, 1);
				window.localStorage.removeItem("cart", JSON.stringify(food[index]));
				window.localStorage.setItem("totalPrice", JSON.stringify(this.totalPrice ));
				this.totalPrice -= food.price;
				this.cartBadge = this.cart.length;
			} else {
				console.log("non esiste");
			}

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
    .fa-square-plus{
        font-size: 3.5rem;
        margin-right: 0.5rem;
    }
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
