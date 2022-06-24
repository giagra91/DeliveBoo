<template>
    <div >
        <Header />
        <div class="d-flex justify-content-end position-relative">
            <div id="cart " class="w-25 position-absolute" v-if="cart.length > 0">
                <div v-for="(item, index) in cart" :key="index" >
                
                    <p >{{item.name}} {{item.quantity}}</p>
                    <p>{{(cart.includes(item)) ? item.quantity : item.name}}</p>
                    <p>{{item.price}}</p>
                    <p>Totale: € {{item.quantity * item.price}}</p>
                </div>
            </div>
        </div>
        
        <div id="my-wrapper">
            <Jumbotron />
            <section class="py-5 overflow-hidden bg-primary" id="home">
                <div class="container">
                    <div class="row flex-center">
                        <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="#!"><img class="img-fluid" src="../../../public/img/logo-deliveboo/gallery/hero-header.png" alt="hero-header" /></a></div>
                            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                                <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Hai fame?</h1>
                                <h1 class="text-800 mb-5 fs-4">Con pochi e semplici click, ti sazierai!!<br class="d-none d-xxl-block" /></h1>
                                <div class="card w-xxl-75">
                                <div class="card-body">
                                    <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Delivery</button>
                                    </div>
                                    </nav>
                                    <div class="tab-content mt-3" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row gx-2 gy-2">
                                                <h5>Filtra per una o più categorie:</h5>
                                                <div class="col d-flex flex-wrap">
                                                    <div class="input-group-icon">
                                                        <div class="form-check mb-2" v-for="(type,index) in cookingTypes" :key="index">
                                                            <input @click="filterRestaurants(type.id)" v-model="selectedCategories" class="form-check-input" name="type" 
                                                            type="checkbox"  :value="type.id" id="flexCheckDefault" >
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                {{type.name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="text-white mx-4" v-if="selectedCategories.length > 0 && filteredRestaurants.length == 0">Non ci sono ristoranti per questa categoria</h4>

            </section>
    
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
                    </div>
                </div>
            </div>
        </div>

            <Restaurants  :restaurants="getRestaurants" @hasClickedMenu="updateJumbo()" />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Jumbotron from '../components/Jumbotron.vue';
import Main from '../components/Main.vue';


export default {
    name: "App",
    components: {
        Header,
        Jumbotron,
        Main
    },
    data: function(){
        return{
            restaurants: [],
            restaurantMenu : [],
            cart : [],
            selectedItem: " ",
            navItems:[
                {
                    label: "Restaurants",
                    routeName : "restaurants"
                },
                {
                    label: "Restaurant",
                    routeName : "restaurant"
                },
            ],
            
            
        }
    },
    methods:{
        getSingleRestaurant(){
            if(this.selectedItem !== " "){
                axios.get(`http://127.0.0.1:8000/api/users/${this.selectedItem}`)
                .then((result) => {
                    console.log(result.data.results.users);
                    this.restaurants = result.data.results.users;
                })
                .catch((error) => {
                    console.warn(error);
                })
            }
            else {
                axios.get(`http://127.0.0.1:8000/api/users/`)
                .then((result) => {
                    this.restaurants = result.data;
                    console.log(result.data)
                })
                .catch((error) => {
                    console.warn(error);
                })
            }
        },
        test(id){
            this.restaurantMenu = [];
            axios.get(`http://127.0.0.1:8000/api/users/`)
                .then((result) => {
                    this.restaurantMenu = result.data[id - 1];
                    console.log(this.restaurantMenu)
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
        },
        addToCart(food){
            let item = {
                "name" : food.name,
                "price" : food.price,
                "quantity" : 1
            }
            if(this.cart.length === 0){
                this.cart.push(item);
            }
            for (let i = 0; i < this.cart.length; i++) {
                if(this.cart[i].name !== item.name){
                this.cart.push(item);
                console.log("non presente");
                    } else {
                item.quantity ++;
                console.log("presente");
                }
                
            }
            window.localStorage.setItem("cartItems", JSON.stringify(item));
            // this.cart.push(JSON.parse(localStorage.getItem('cartItems')));
            // this.cart.push(item);
            // if(this.cart.includes(item.name)){
            //     item.quantity += 1;
            //     console.log("presente");
            // } else {
            //     this.cart.push(item);
            //     console.log("non presente");
            // }
            console.log(item.quantity)
            // console.log(this.cart);
            // console.log(JSON.parse(localStorage.getItem('cartItems')));
        },
        removeFromCart(food){
            this.cart.forEach((item, index) => {
                if(food.name == item.name){
                    window.localStorage.removeItem("cartItems", JSON.stringify(food[index]));
                    this.cart.splice(index, 1);
                    console.log(this.cart)
                } else {
                    console.log("non esiste");
                }
            });
        }
    },
    created(){
        this.getSingleRestaurant();
        window.localStorage.clear()
    }
}
</script>

<style lang="scss">

.btn-primary{
    background-color: #FFB30E !important;
    border-color: #FFB30E !important;
}
.bg-primary{
    background-color: #FFB30E !important;
}


.wrapper{margin:10vh}
//post card styles

.card{
border: none;
transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
overflow:hidden;
border-radius:20px;
min-height:450px;
box-shadow: 0 0 12px 0 rgba(0,0,0,0.2);

@media (max-width: 768px) {
min-height:350px;
}

@media (max-width: 420px) {
min-height:300px;
}

&.card-has-bg{
transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
background-size:120%;
background-repeat:no-repeat;
background-position: center center;
&:before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: inherit;
    -webkit-filter: grayscale(1);
-moz-filter: grayscale(100%);
-ms-filter: grayscale(100%);
-o-filter: grayscale(100%);
filter: grayscale(100%);}

&:hover {
    transform: scale(0.98);
    box-shadow: 0 0 5px -2px rgba(0,0,0,0.3);
    background-size:130%;
    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

    .card-img-overlay {
    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
    background: rgb(146, 117, 36);
    background: linear-gradient(0deg, rgba(103, 114, 4, 0.5) 0%, rgb(187, 59, 20) 100%);
    }
}
}
.card-footer{
background: none;
border-top: none;
    .media{
    img{
    border:solid 3px rgba(255,255,255,0.3);
    }
}
}
.card-meta{color:#bd2626}
.card-body{
transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
}
&:hover {
.card-body{
    margin-top:30px;
    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
}
cursor: pointer;
transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
}
.card-img-overlay {
transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
background: rgb(165, 179, 44);
background: linear-gradient(0deg, rgba(165, 48, 19, 0.379) 0%, rgb(189, 177, 68) 100%);
}
}
@media (max-width: 767px){

}
</style>
